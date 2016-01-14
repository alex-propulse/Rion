<?=get_header()?>

Vignobles

<div class="page-content" id="page-vignoble">     
    <div class="row text-center">
    	<h1>Les vignobles</h1>
    </div>
    <div id="carte-container">    

	    <div class="medium-3 small-12 columns carte-vignoble" id="nuits">
	    	<button>Nuits Saint Georges</button>
	    </div>
	    <div class="medium-3 small-12 columns carte-vignoble" id="vosne">
	    	<button>Vosne Romanée - Flagey</button>
	    </div>
	    <div class="medium-3 small-12 columns carte-vignoble" id="premeaux">
	    	<button>Premeaux</button>
	    </div>
	    <div class="medium-3 small-12 columns carte-vignoble" id="comblanchien">
	    	<button>Comblanchien - Corgoloin</button>
	    </div>

	</div>
</div>

<script type="text/javascript" src="<?=get_template_directory_uri()?>/js/jquery.zoom.min.js"></script>
<script type="text/javascript">
 	$('#nuits').zoom({url: '<?=get_template_directory_uri()?>/img/cartes/nuits-saint-georges-large.jpg'});
 	$('#vosne').zoom({url: '<?=get_template_directory_uri()?>/img/cartes/vosne-romanee-large.jpg'});
 	$('#premeaux').zoom({url: '<?=get_template_directory_uri()?>/img/cartes/premeaux-large.jpg'});
 	$('#comblanchien').zoom({url: '<?=get_template_directory_uri()?>/img/cartes/vosne-romanee-large.jpg'});
</script>



<?=get_footer()?>