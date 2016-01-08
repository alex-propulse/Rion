<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage SR
 */

get_header(); ?>


<section class="page-content" id="page-<?php echo($post->post_name);?>">
    <div class="page-banner" style="background-image:url('<?=get_template_directory_uri()?>/img/bg/404_header.jpg')"></div>
    <div class="intro ">
        <!-- TITLE -->
        <div class='row text-center'>
            <h1>Page introuvable</h1>
        </div>      
    </div>

    <div class="row text-center">
    	<h2>La page que vous cherchez n'est pas disponible.</h2>
    	<p>Choisissez une page dans le menu ou <a href='".get_site_url()."'>retournez sur la page d'accueil</a>.</p>		

    	<br/>
    	<br/><br/><br/>
</section>





<?php get_footer(); ?>