<?php
	get_header();
 	$args = array( 'post_type' => 'millesimes', 'posts_per_page' => -1);
    $millesimes = get_posts($args);     
    ?>    

	<div class="page-content" id="page-millesimes">  
		<div class="owl-area">
			<div class="row">
				<h1>Les millésimes</h1>
			</div>		
			<div class="owl-carousel">  
			<?php foreach ($millesimes as $m) { ?>
			
				<div class="row" data-dot="<?=$m->post_title?>">
					<div class="large-8 large-centered content-txt columns">
						<h2>Le millésime <?=$m->post_title?></h2>
						<?=$m->post_content?>
					</div>
				</div>						
			<?php } ?>
				
			</div>		
		</div>
	</div>
<script type="text/javascript" src="<?=get_template_directory_uri()?>/js/owl.carousel-1.8.js"></script>
<script type="text/javascript">

    $('.owl-carousel').owlCarousel({
			items:1,			
			loop:true,						
			nav:false,       
			autoHeight:true,
			dotData:true,
			animateOut: 'zoomOut',
			animateIn: 'slideInDown'
		});

    </script>


 <?=get_footer()?>