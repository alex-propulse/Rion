<?php get_header(); 
global $post;
$postName = $post->post_name;
$news = get_all_news();

?>

<div class="page-content" id="page-<?=$postName?>">    
    <div class="row content">
        <div class="small-12 column">

			<?php foreach ($news as $actu) { ?>

			<div class="cadre">
				<h1><?=$actu->post_title?></h1>
				<div class="tags">
					<?=list_categories($actu->ID)?>
 					
				</div>
				<?=wpautop($actu->post_content)?>
			</div>
				      
		    <?php } ?>          

        </div>
    </div>
</div>

<?php get_footer(); ?>