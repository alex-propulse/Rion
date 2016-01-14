<?php get_header(); 
global $post;
$postName = $post->post_name;
$postTitle =get_the_title($post->ID);
?>

<div class="page-content" id="page-<?=$postName?>">    
    <div class="row content">
        <div class="small-12 column">
            <?php if (have_posts()) : while (have_posts()) : the_post(); 
                the_content(__('(more...)')); 
            endwhile; else: 
             _e('Sorry, we couldn’t find the post you are looking for.');
             endif;?>
        </div>
    </div>
</div>
	
<?php get_footer(); ?>