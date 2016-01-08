<?php get_header(); ?>
<div id="homepage">
	<div class="slider-home hide-for-small-only">
		<div class="row">			
			<div id="slide-home">
				<?=display_home_slider()?>		
			</div>			
			<div class="caption">
				<span>E-Cabinet</span>
				<p>Implanté historiquement à DIJON, le cabinet SOULARD-RAIMBAULT est doté des meilleurs outils pour vous permettre de lui confier vos missions sans vous déplacer.</p>
			</div>
		</div>
		<div class="owl-theme">
            <div class="owl-controls">
        		<div id="customDots" class="owl-dots"></div>
        	</div>
        </div>
	</div>		
	<?=display_home_banner()?>	
	<?php 
	if ( have_posts() ) {
		while ( have_posts() ) { ?>
			<div id="nos-valeurs" class="row section">
				<div class="small-12 column">
					<?php
						the_post(); 
						the_content();					
					?>
				</div>
			</div>
	<?php } // end while
	} // end if	
	?>	
	<div id="nos-expertises" class="section section-colored">
		<div class="row small-up-2 medium-up-7 text-center">
			<h1>Nos expertises</h1>
			<div class="column wow fadeIn">
				<a href="./nos-competences/?id=droit-du-travail">
					<img alt="Expertise droit du travail" src="<?=get_template_directory_uri()?>/img/expertises/DROIT_DU_TRAVAIL.png"/>
					<br/>Droit du travail
				</a>
			</div>
			<div class="column wow fadeIn" data-wow-delay=".5s">
				<a href="./nos-competences/?id=droit-de-la-famille">
					<img alt="Expertise droit de la famille" src="<?=get_template_directory_uri()?>/img/expertises/FAMILLE.png"/>
					<br/>Droit de la famille
				</a>
			</div>
			<div class="column wow fadeIn"  data-wow-delay="1s">
				<a href="./nos-competences/?id=procedure-dappel">
					<img alt="Expertise procédure d'appel" src="<?=get_template_directory_uri()?>/img/expertises/PROCEDURE_APPEL.png"/>
					<br/>Procédure d'appel
				</a>
			</div>
			<div class="column wow fadeIn" data-wow-delay="1.5s">
				<a href="./nos-competences/?id=recouvrement-de-creances">
					<img alt="Expertise recouvrement de créances" src="<?=get_template_directory_uri()?>/img/expertises/RECOUVREMENT.png"/>
					<br/>Recouvrement
				</a>
			</div>				
			<div class="column wow fadeIn" data-wow-delay="2s">
				<a href="./nos-competences/?id=droit-immobilier">
					<img alt="Expertise Droits immobilier" src="<?=get_template_directory_uri()?>/img/expertises/DROIT_IMMOBILIER.png"/>
					<br/>Droit immobilier
				</a>
			</div>
			<div class="column wow fadeIn"  data-wow-delay="2.5s">
				<a href="./nos-competences/?id=droit-equin-sport">
					<img alt="Expertise droit équin" src="<?=get_template_directory_uri()?>/img/expertises/DROIT_EQUIN.png"/>
					<br/>Droit équin et du sport
				</a>
			</div>
			<div class="column wow fadeIn"  data-wow-delay="3s">
				<a href="./nos-competences/?id=droit-routier-et-automobile">
					<img alt="Expertise Droit routier et automobile" src="<?=get_template_directory_uri()?>/img/expertises/DROIT_AUTOMOBILE.png"/>
					<br/>Droit routier et automobile
				</a>
			</div>
		</div>
	</div>

	<div id="infos" class="section section-infos">
		<div class="row">
			<div class="small-12 medium-6 columns actus">				
				<h1>Actualités</h1>
				<div class="owl-theme">
		            <div class="owl-controls">
		        		<div id="customNav" class="owl-nav"></div>
		        	</div>
		        </div>
				<?=display_news_slider()?>
				<div class="text-center">
					<a class="button" href="./actualites">Voir toutes les actualités</a>
				</div>
			</div>
			<div class="small-12 medium-6 columns">
				<h1>Liens utiles</h1>
				<?=display_liens_utiles()?>
			</div>
		</div>
	</div>
</div>


<?php get_footer(); ?>