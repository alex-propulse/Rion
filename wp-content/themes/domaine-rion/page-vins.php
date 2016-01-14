<?php get_header(); ?>

<div id="page-vins" class="page-content">	
	
		<?php
		$tax_terms = get_terms('Types'); 
		foreach ($tax_terms as $tax_term) {	

			echo('<div class="row"><h1>'.$tax_term->name.'</h1>');
			get_vins_from_type($tax_term->slug);
			echo("</div>");

		} ?>		
	</div>

		
<?php get_footer(); ?>
