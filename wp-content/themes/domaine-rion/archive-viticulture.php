<?php
	get_header();
 	$args = array( 'post_type' => 'viticulture', 'posts_per_page' => -1);
    $sections = get_posts($args); 
    $img_left_side = true;
    ?>

<div class="page-content" id="page-viticulture">    
	<?php foreach ($sections as $section) { ?>


		<div class="row" data-equalizer>

			<?php if($img_left_side){
			//Image à gauche ?>				
			<div class="small-12 large-6 large-push-6 column content-img" style="background-image:url(<?=thumb_or_first($section->ID)?>" data-equalizer-watch></div>
	        	<div class="small-12 large-6 large-pull-6 column content-txt" data-equalizer-watch>
					<h1><?=$section->post_title?></h1>
					<?=$section->post_content?>
				</div>
				

			<?php $img_left_side = false;
			}else{ 	$img_left_side = true;
			//Image à droite  ?>						 
				<div class="small-12 large-6 column content-img" style="background-image:url(<?=thumb_or_first($section->ID)?>" data-equalizer-watch></div>				
				<div class="small-12 large-6 column content-txt" data-equalizer-watch>
					<h1><?=$section->post_title?></h1>
					<?=$section->post_content?>
				</div>

				<?php } ?>

		</div>

	<?php } ?>
	
</div>
    
 <?=get_footer()?>