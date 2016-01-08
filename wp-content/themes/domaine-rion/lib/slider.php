<?php
include(get_template_directory().'/lib/meta/my-meta-box-class.php');
$root = realpath($_SERVER["DOCUMENT_ROOT"]);

add_action('init', 'slider_module');

/* init du module */
function slider_module() 
{
	$slider_args = array(				
		'labels' => array(
		    'name' => 'Slider',
		    'singular_name' => 'slide',
		    'all_items' => 'Toutes les slides',
		    'edit_item' => "Éditer le slide",
		    'view_item' => "Voir le slide",
		    'update_item' => "Mettre à jour le slide",
		    'add_new_item' => 'Ajouter un slide',
		    'new_item_name' => 'Nouveau slide',
		    'search_items' => 'Rechercher parmi les slides',
		    'popular_items' => 'Slides les plus populaires'
		  ),
		'public' => true,
		'show_ui' => true,
		'_builtin' => false, 
		'_edit_link' => 'post.php?post=%d',
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array("slug" => "slider"),
		'taxonomies' => array(),
		'query_var' => "slider", 
		'supports' => array('title','editor','thumbnail'),
		'show_in_nav_menus'   => TRUE,
		'menu_icon' => get_stylesheet_directory_uri() . '/img/admin/slider.png',  
	);	

	// enregistrements des entités	
	register_post_type( 'slider' , $slider_args ); 	
}

/*DISPLAY*/

function display_home_slider(){
	
	$args=array(
		'post_type' => "slider",
		'post_status' => 'publish',
		'posts_per_page' => -1,
		'orderby' => 'date',
	    'order'   => 'DESC'
		);

	$slides = get_posts($args);	
	foreach($slides as $slide){		
		$thumb = wp_get_attachment_image_src(get_post_thumbnail_id($slide->ID),'full');?>
		<div class='item' style="background-image:url(<?=$thumb[0]?>"></div>
		<?php
	}
}

function display_home_banner(){
	$args=array(
		'post_type' => "slider",
		'post_status' => 'publish',
		'posts_per_page' => 1,
		'orderby' => 'date',
	    'order'   => 'DESC'
		);

	$slides = get_posts($args);	
	$slide = $slides[0];	
	$thumb = wp_get_attachment_image_src(get_post_thumbnail_id($slide->ID),'large');?>
	<div class="row">
		<div id="banner-home" class=" small-12 column show-for-small-only">
			<img alt="Soulard et Raimbault | Avocats" src="<?=$thumb[0]?>"/>
		</div>
	</div>
		
	<?php	
}



function display_news_slider(){
	$args = array(	    
	    'post_type'   => 'post',
	    'post_status' => 'publish',
	    'numberposts' => -1,
	    'category_name' => "a-la-une"
	  );
	  $my_posts = get_posts($args);
	  if( $my_posts) : ?>
	  <div id="slider-news">
	  	<?php foreach ($my_posts as $news): ?>
	  	<div class="item">
	  		<h2><?=$news->post_title?></h2>   
	  		<div class="justified"><?=wpautop($news->post_content);?></div>
	  	</div>	  	
	  <?php endforeach ?>
	</div>

	    
	  <?php endif;
}

function display_news_slider_competences(){
	$args = array(
	    'name'        => $the_slug,
	    'post_type'   => 'post',
	    'post_status' => 'publish',
	    'numberposts' => -1
	  );
	  $my_posts = get_posts($args);
	  if( $my_posts) : ?>
	  <div id="slider-news">
	  	<?php foreach ($my_posts as $news): ?>
	  	<div class="item">
	  		<h2><?=$news->post_title?></h2>   
	  		<?=wpautop($news->post_content);?>
	  	</div>	  	
	  <?php endforeach ?>
	</div>

	    
	  <?php endif;
}
?>
