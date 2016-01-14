<?php
/*
error_reporting(E_ALL | E_STRICT);
ini_set("display_errors", 1);
ini_set("html_errors", 1);
*/

date_default_timezone_set('Europe/Paris');

function my_function_admin_bar(){
    return false;
}
add_filter( 'show_admin_bar' , 'my_function_admin_bar');

add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );

add_action( 'init', 'register_menus' ); 
add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );
add_filter( 'the_content', 'wpautop' );

include(get_template_directory().'/lib/meta/my-meta-box-class.php');

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
    'menu_class' => 'menu vertical',    
    'items_wrap'      => '<ul class="menu vertical" data-accordion-menu>>%3$s</ul>',    

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


 
//Optional fallback
 
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


function display_home_menu(){
  $menu_name = 'main-menu';

  $menu = wp_get_nav_menu_object($menu_name);
  $menu_items = wp_get_nav_menu_items($menu->term_id);
  $menu_list = '<div class="row" id="menu-' . $menu_name . '">';
  
  foreach ( (array) $menu_items as $key => $menu_item ) {
      $title = $menu_item->title;
      
      $url = $menu_item->url;
      $id = $menu_item->ID;
      $nameArr = explode('/',$url);
      $name = $nameArr[count($nameArr)-2];
      
      $menu_list .= '<div class="item-container small-12 medium-6 large-2 columns">';
      $menu_list .= '<a href="' . $url . '">';
      $menu_list .= '<div class="menu-item '.$name.'">';
      $menu_list .= '<div class="button">'.$title.'</div></div>';            
      $menu_list .=  '</a></div>';
  }

  $menu_list .= '</div>';
  echo($menu_list);

}

/* Page viticulture*/

/* LES VINS */ 

add_action( 'init', 'create_post_type' );

function get_vins_from_type($type){

    $args = array(
        'post_type' => 'appellation',
                'posts_per_page' => -1,  //show all posts
                'tax_query' => array(
                    array(
                        'taxonomy' => 'Types',
                        'field' => 'slug',
                        'terms' => $type,
                    )
                ) 
            );

    $appellations = get_posts($args);
    foreach ($appellations as $vin) {
      echo('<div class="small-12 medium-3 columns">');
      echo('<a href="'.get_post_permalink($vin->ID).'"><article class="article-card">');
      echo('<img src="'.thumb_or_first($vin->ID,false,false,'medium').'"/>');
      echo('<div class="card-content">');
      echo('<h2>'.$vin->post_title.'</h2></div></article></a></div>');            
    }
}




function create_post_type() {

  register_post_type( 'appellation', array(
     'labels' => array(
          'name' => __( 'Appellations' ),
          'singular_name' => __( 'Appellation' )
        ),

      'public' => true,
      'show_ui' => true,
      'publicly_queryable' => true,
      'query_var' => true,
      'capability_type' => 'post',
      'hierarchical' => false,      
      'supports' => array('title', 'editor','thumbnail'),
      'has_archive' => true
    ));

    register_post_type( 'viticulture', array(
     'labels' => array(
          'name' => __( 'Page Viticulture' ),
          'singular_name' => __( 'section viticulture' )
        ),
      'public' => true,
      'hierarchical' => true,
      'has_archive' => true,
      'supports' => array('title', 'editor','thumbnail')
    ));

      register_post_type( 'millesimes', array(
     'labels' => array(
          'name' => __( 'Millésimes' ),
          'singular_name' => __( 'Millésime' )
        ),
      'public' => true,
      'hierarchical' => true,
      'has_archive' => true      
    ));
}


$config = array(
    'id' => 'text2',             // meta box id, unique per meta box 
    'title' => 'Contenu',      // meta box title
    'pages' => array('millesime'),    // post types, accept custom post types as well, default is array('post'); optional
    'context' => 'normal',               // where the meta box appear: normal (default), advanced, side; optional
    'priority' => 'high',                // order of meta box: high (default), low; optional
    'fields' => array(),                 // list of meta fields (can be added by field arrays) or using the class's functions
    'local_images' => false,             // Use local or hosted images (meta box images for add/remove)
    'use_with_theme' => false            //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
);

$my_meta = new AT_Meta_Box($config);
$my_meta->addWysiwyg('section2',array('name'=> 'Contenu de la 2nd section'));
$my_meta->addWysiwyg('section3',array('name'=> 'Contenu de la 3e section'));
$my_meta->addWysiwyg('section4',array('name'=> 'Contenu de la 4e section'));


$my_meta->Finish();

//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_topics_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it topics for your posts

function create_topics_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

  $labels = array(
    'name' => _x( 'type-appelation', "Type d'appelation"),
    'singular_name' => _x( 'Type', "Type d'appelation"),
    'search_items' =>  __( 'Chercher un type' ),
    'all_items' => __( 'Tous les types' ),
    'parent_item' => __( 'Parent du type' ),
    'parent_item_colon' => __( 'Parent du Type:' ),
    'edit_item' => __( 'Modifier le type' ), 
    'update_item' => __( 'Mettre le type à jour' ),
    'add_new_item' => __( 'Ajouter un nouveau type' ),
    'new_item_name' => __( 'Nouveau nom de type' ),
    'menu_name' => __( "Types d'appellation"),
  );  

// Now register the taxonomy

  register_taxonomy('Types',array('appellation'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'type' ),
  ));

}

?>