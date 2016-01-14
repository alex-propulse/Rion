<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>>
<head>	
	<!--=== META TAGS ===-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	 	   
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     
    <!--=== LINK TAGS ===-->
    <link rel="shortcut icon" type="image/png" href="<?=get_template_directory_uri()?>/img/favicon.png" />
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS2 Feed" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
 
    <!--=== TITLE ===-->  
    <title><?php wp_title(); ?></title>

    <!--=== CSS ===-->  
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/foundation/6.0.5/foundation.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">    
    <link rel="stylesheet" type="text/css" href="<?=get_template_directory_uri()?>/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?=get_template_directory_uri()?>/css/owl.transitions.css">
    <link rel="stylesheet" type="text/css" href="<?=get_template_directory_uri()?>/css/owl.theme.css">    
    <link rel="stylesheet" type="text/css" href="<?=get_template_directory_uri()?>/css/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="<?=get_template_directory_uri()?>/css/animate.css">
    <link rel="stylesheet" type="text/css" href="<?=get_stylesheet_uri()?>">

    <!--=== WP_HEAD() ===-->
    <?php wp_head(); ?>  
    
 </head>  
<body> 

    <!-- Start #main -->
  
<div id="main" class="m-scene">        


<div id="sur-menu"></div>

  <div id="header">    
    <a class="logo" href="<?=get_site_url()?>">
      <img  alt="logo domaine Rion" src="<?=get_template_directory_uri()?>/img/DOMAINE_RION_LOGO.png">
    </a>

    <div id="main-menu">
        <div class="row show-for-large" >
            <?=display_primary_menu()?>    
        </div>

        <div class="hide-for-large">
            <ul class="vertical menu" data-accordion-menu>
                <li>
                    <a href="#"><i class="fa fa-bars"></i>MENU</a>
                    <?=display_primary_menu()?>
                </li>
            </ul>
        </div>
    </div>
  </div>
        <div class="scene_element scene_element--fadein">




 



