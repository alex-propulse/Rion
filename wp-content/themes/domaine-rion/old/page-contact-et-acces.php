<?php get_header(); 
global $post;
$postName = $post->post_name;
$postTitle =get_the_title($post->ID);


?>

<div class="page-content" id="page-<?=$postName?>">    
    <div class="row content">
        <div class="small-12 column map">
        	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2704.740508817566!2d5.040952495174887!3d47.31940770276833!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f29de832b99d65%3A0x5d614615d9f4920!2s6+Rue+Hernoux%2C+21000+Dijon!5e0!3m2!1sfr!2sfr!4v1449830933827" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>        
    </div>
    <div class="row bg-white">
    	<div class="small-12 medium-6 column text-center">
    		<img src="<?=get_template_directory_uri()?>/img/PLAN.jpg">
    	</div>
    	<div class="small-12 medium-6 column">    		
			<h1>Contactez-nous</h1>    		
			<div id="formresult"></div>
			<form id='contactform' method='post' action='<?=get_template_directory_uri()?>/lib/mailer.php'>    				
            
                <div class="row">
                    <div class="small-12 medium-3 column">
                        <label for='username'>Nom* : </label>
                    </div>
                    <div class="small-12 medium-9 column">
                        <input id="username" required name='username' type='text'>
                    </div>
                </div>

                <div class="row">
                    <div class="small-12 medium-3 column">
                        <label for='e-mail'>E-mail* : </label>
                    </div>
                    <div class="small-12 medium-9 column">
                        <input id="e-mail" required name='e-mail' type='email'>
                    </div>
                </div>

                 <div class="row">
                    <div class="small-12 medium-3 column">
                        <label for='email'>Téléphone</label>
                    </div>
                    <div class="small-12 medium-9 column">
                        <input id="phone" required name='phone' type='tel'>
                    </div>
                </div>

                <div class="row">
                    <div class="small-12 medium-3 column">
                        <label for='message'>Message</label>
                    </div>
                    <div class="small-12 medium-9 column">
                        <textarea rows="3" name="message" required></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="small-12 medium-9 medium-push-3 column">
                        <div class='g-recaptcha' data-sitekey='6LdQ4hITAAAAAIWjgrgEdP9fk0F7h_BZXLNTQGqc'></div>             
                    </div>                    
                    <div class="small-12 medium-9 column">
                        <button class="button" type="submit" name="submit" class="btn btn-info">Envoyer</button>            
                    </div>
                </div>    
			</form>
    	</div>
    </div>
</div>
<script src='https://www.google.com/recaptcha/api.js'></script>
<?php get_footer(); ?>