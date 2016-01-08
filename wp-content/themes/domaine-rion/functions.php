<?php

error_reporting(E_ALL | E_STRICT);
ini_set("display_errors", 1);
ini_set("html_errors", 1);

date_default_timezone_set('Europe/Paris');

add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );

add_action( 'init', 'register_menus' ); 
add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );
add_filter( 'the_content', 'wpautop' );

include(get_template_directory().'/lib/slider.php');

function register_menus() {	 

   register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'Menu Top' ),
    'footer' => __( 'Footer Menu', 'Menu footer' ),
    ));
}

function enqueue_scripts() {

  /* JS */
  wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-1.11.3.min.js');
}

function display_liens_utiles(){
  
  $the_slug = 'liens-utiles';
  $args = array(
    'name'        => $the_slug,
    'post_type'   => 'page',
    'post_status' => 'publish',
    'numberposts' => 1
  );

  $my_post = get_posts($args);
  if( $my_post[0] ) :?>    
    <?=$my_post[0]->post_content?>
  <?php endif;
}

function display_primary_menu() {

  wp_nav_menu(array(    
    'theme_location' => 'primary',
    'menu' => 'Primary Menu',
    'container' => false,
    'menu' => __( 'Top Bar Menu', 'textdomain' ),
    'menu_class' => 'dropdown menu vertical medium-horizontal',    
    'items_wrap'      => '<ul id="%1$s" class="%2$s" data-dropdown-menu>%3$s</ul>',    
    'fallback_cb' => 'f6_topbar_menu_fallback',
    'walker' => new F6_TOPBAR_MENU_WALKER()
  ));  
}

function display_footer_menu(){
  wp_nav_menu( array(
   'theme_location' => 'footer',
    'menu' => 'Footer Menu',
    'container' => false, // remove nav container
    'container_class' => '', // class of container
    'menu_class' => 'footer-menu', // adding custom nav class
    'before' => '', // before each link <a>
    'after' => '', // after each link </a>
    'link_before' => '', // before each link text
    'link_after' => '', // after each link text
    'depth' => 1, // limit the depth of the nav
    'fallback_cb' => false // fallback function (see below)    
  ) );

}

class F6_TOPBAR_MENU_WALKER extends Walker_Nav_Menu
{   
  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"vertical menu\" data-submenu>\n";
  }
}
 
//Optional fallback
function f6_topbar_menu_fallback($args)
{  
  $walker_page = new Walker_Page();
  $fallback = $walker_page->walk(get_pages(), 0);
  $fallback = str_replace("<ul class='children'>", '<ul class="children submenu menu vertical" data-submenu>', $fallback);
  echo '<ul class="dropdown menu" data-dropdown-menu">'.$fallback.'</ul>';
}
 
// thumbnail d'un post ou première image
function thumb_or_first($post_id = null, $path = true, $nopic = false, $size = 'large', $details = false) {
  global $root;
  global $default_img;
  $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), $size);
  if (!empty($thumb)) {
    $thumb = $thumb[0];
  } else {
    $imgs = array();
    $images = get_children(array(
      'post_type' => 'attachment',
      'numberposts' => 1,
      'post_status' => null,
      'post_parent' => $post_id,
      'orderby' => 'menu_order',
      'order' => 'ASC',
      'post_mime_type' => 'image'
    ));
    if (count($images)) {
      foreach($images as $image) {
        $attachment = wp_get_attachment_image_src($image->ID, 'large');
        if (file_exists($root.str_replace('http://'.$_SERVER['HTTP_HOST'], '', $attachment[0]))) {
          $thumb = $attachment[0];
        } else {
          if ($nopic)
            $thumb = 'http://'.$_SERVER['HTTP_HOST'].$default_img;
        }
      }
    } else {
      if ($nopic)
        $thumb = 'http://'.$_SERVER['HTTP_HOST'].$default_img;
    }
  }
  if ($path)
    $thumb = str_replace('http://'.$_SERVER['HTTP_HOST'], '', $thumb);
  return $thumb;
}

function get_all_news(){
  $args = array(     
    'post_type'   => 'post',
    'post_status' => 'publish',
    'numberposts' => -1    
  );

    $news = get_posts($args);
    return $news;
}

function get_news_by_slug($slug){

  $args_news = array(               
    'post_type'   => 'post',
    'post_status' => 'publish',
    'numberposts' => 2,
    'category_name' => $slug
  );

  $news = get_posts($args_news);
  return $news;
}

function get_competences(){
  global $post;

  $args_comp = array(     
      'post_type'   => 'page',
      'post_status' => 'publish',
      'numberposts' => -1,
      'post_parent' => $post->ID    
    );

  return get_posts($args_comp);
}

function list_categories($post_id){

  foreach(wp_get_post_categories($post_id) as $c)
  {
    $cat = get_category($c);
    if($cat->name!="A la une"){
     echo("<span>".$cat->name."</span>");
    }
  }
}

?>