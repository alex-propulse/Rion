<footer class="text-center">
	<div class="row">
		<div class="medium-4 small-12 columns">
			<img alt="Soulard & Raimbault" src="<?=get_template_directory_uri()?>/img/logo_sr.png"/>
		</div>
		<div class="medium-4 small-12 columns medium-text-left small-text-center">
			<address>
				<strong>Cabinet Soulard Raimbault</strong><br/>
					6 rue Hernoux<br/>
					21000 DIJON<br/>
					Tél. 03 80 30 85 85<br/>
					Fax. 03 80 30 80 90<br/>
					<a href="mailto:accueil@soulard-raimbault.fr">accueil@soulard-raimbault.fr</a>
				</address>
		</div>
		<div class="medium-4 small-12 columns medium-text-left small-text-center">
				<?=display_footer_menu()?>
		</div>	
	</div>	

	<div class="credits">		
		<div class="row">
			<div class="small-12 medium-6 medium-text-left columns">
				Copyright ©<?php the_time('Y'); ?> Soulard Raimbault  - Tous droits réservés.
			</div>
			<div class="small-12 medium-6 medium-text-right columns">			
				<div class="propulse_effect">
            <?=_e('Conception / Realisation')?> : <a target="_blank" href="http://www.propulse.fr"><div><span data-hover="Propulse">Propulse</span></div></a>
          </div>
			</div>			
		</div>
	</div>    
</footer>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/foundation/6.0.5/foundation.min.js"></script>
<script type="text/javascript" src="<?=get_template_directory_uri()?>/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?=get_template_directory_uri()?>/js/main.js"></script>


</body>
</html>