<?php get_header(); 
global $post;
$postName = $post->post_name;
$postTitle =get_the_title($post->ID);
$type = wp_get_post_terms( $post->ID, "Types");
//$type_name = get_post_taxonomies( $post );
?>

<div class="page-content single-appellation">    
    <div class="row content text-center">
        <div class="small-12 medium-6 medium-centered column">

        	<div id="back">
        		<a href="../../vins"><i class="fa fa-chevron-left"></i> retour</a>
        	</div>

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            	<h1><?=$type[0]->name?></h1>         	
            	<h2><?=$post->post_title?></h2>         
            	<img src="<?=thumb_or_first($post->ID,false,true,'medium')?>" />

			<?php  the_content(__('(more...)')); 
            endwhile; else: 
             _e('Sorry, we couldn’t find the post you are looking for.');
             endif;?>
        </div>
    </div>
</div>

<?php get_footer(); ?>