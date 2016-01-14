<?php get_header(); 
global $post;
$postName = $post->post_name;
$postTitle =get_the_title($post->ID);
?>

<div class="page-content" id="page-<?=$postName?>">     
    <div class="row text-center">

        <h1>Contactez-nous</h1>     
        <h2>DOMAINE DANIEL RION & FILS</h2>

        <div class="small-12 medium-6 column medium-text-right small-text-center">
            Route Nationale 74 - Prémeaux<br/>
            21700 Nuits-Saint-Georges<br/>        
            FRANCE<br/><br/>
        </div>
        <div class="small-12 medium-6 column medium-text-left small-text-center">
           <div id="coordonnees">
                <i class="fa fa-phone"></i> : 03 80 62 31 28<br/>
                <i class="fa fa-fax"></i> : 03 80 61 13 41 
            </div>
        </div>


    </div>

    <div class="row">
        <div class="small-12 medium-6 column">          
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21714.397651367086!2d4.926885186211169!3d47.13239408524364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f291c259f4c6ef%3A0x495bc2c0e505c96e!2sDomaine+Daniel+Rion+Et+Fils!5e0!3m2!1sfr!2sfr!4v1452764579376" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <div class="small-12 medium-6 column">  
                    				
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

<script src='https://www.google.com/recaptcha/api.js'></script>
<?php get_footer(); ?>