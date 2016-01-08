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

<div class="top-menu row align-bottom">

  <!-- logo -->
    <div class="small-12 medium-2 large-2 logo column text-center">     
      <a href="<?=get_home_url()?>"><img alt="Soulard & Raimbault | Avocats" src="<?=get_template_directory_uri()?>/img/logo.png"></a>
    </div>

  <!-- sur-menu -->
    <div class="sur-menu small-12 medium-10 column text-right">
      Notre numéro de téléphone : 
      <br class="show-for-small-only"/>
      <strong><a href="tel:0380308585">03 80 30 85 85</a></strong>
      <!--<div id="paiement"><i class="fa fa-lock"></i>Paiement en ligne</div>-->
    </div>

  <!-- Btn Menu small -->
    <div class="small-12 columns text-center" data-responsive-toggle="main-menu" data-hide-for="medium">
      <div id="btn-menu" data-toggle>
        <i class="fa fa-bars"></i>
        MENU
      </div>
    </div>

  <!-- Menu -->
    <div class="small-12 medium-12 large-10 column text-center" id="main-menu">
      
        <?=display_primary_menu()?>
      
    </div>
  

</div>