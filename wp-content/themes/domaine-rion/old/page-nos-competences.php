<?php get_header(); 

  $inc =0;
  $anchor="";  
  $posts_c = get_competences();

  if(isset($_GET["id"])){$anchor=$_GET["id"];}
 ?>

<div class="page-content" id="page-nos-competences">
	<div class="row">		
		<ul class="accordion" data-accordion data-allow-all-closed="true">	
		<?php foreach ($posts_c as $comp) { 

			$inc++; 
			$is_active = "";
			if($comp->post_name==$anchor){$is_active=" is-active";}?>
		  
			<li class="accordion-item <?=$is_active?>" id="<?=$comp->post_name?>">	    
			    <a href="#panel<?=$inc?>d" role="tab" class="accordion-title" id="panel<?=$inc?>d-heading" aria-controls="panel<?=$inc?>d">
			    	<div class="title-competence" id="title-<?=$comp->post_name;?>"><?=$comp->post_title;?></div>
			    </a>	  
			  	<div id="panel<?=$inc?>d" class="accordion-content" role="tabpanel" data-tab-content aria-labelledby="panel<?=$inc?>d-heading">
			  		<div class="row competence">
			  			<div class="small-12 medium-10 columns text-justify">
			  	 			<?=wpautop($comp->post_content);?>
			  	 		</div>
			  	 		<div class="small-12 medium-2 text-center columns">
			  	 			<img src="<?=thumb_or_first($comp->ID, true);?>"/>
			  	 		</div>
			  	 	</div>
			  	 	<!--actus -->
			  	 	<div class="actus">
			  	 		<div class="row">
				  	 		<?php 
				  	 		$news = get_news_by_slug($comp->post_name);

				  	 		if(count($news)>0){ ?>

				  	 		<div class="small-12 medium-6 column actu border-right">
				  	 			<h1>Actualités</h1>
				  	 			<h2><?=$news[0]->post_title?></h2>

				  	 		<div class="text-justify"><?=wpautop($news[0]->post_content);?></div>
				  	 		</div>
				  	 		<div class="small-12 medium-6 actu column">
				  	 			<?php if(isset($news[1])){ 
				  	 				echo("<h2>".$news[1]->post_title."</h2>");
				  	 				echo("<div class='text-justify'>".wpautop($news[1]->post_content)."</div>");
				  	 			}?>
				  	 		</div>
				  	 		<?php } ?>
				  	 	</div>
			  	 	</div>
			    </div>
			</li>
		 	<?php } ?>
		</ul>
	</div>
</div>

<?=get_footer()?>