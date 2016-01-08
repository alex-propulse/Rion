<?php get_header(); 
global $post;
$postName = $post->post_name;
$postTitle =get_the_title($post->ID);
?>

<div class="page-content" id="page-<?=$postName?>">
    <div class="row">
        <div class="small-12 medium-8 medium-centered text-center column">
            <?php if (have_posts()) : while (have_posts()) : the_post(); 
                the_content(__('(more...)')); 
            endwhile; else: 
             _e('Sorry, we couldn’t find the post you are looking for.');
             endif;?>
        </div>
    </div>    
    <div id='form-cabinet' class="row  bg-white">
        <div class="small-12 text-center column no-padding">
            <img alt="e-cabinet" src="<?=get_template_directory_uri()?>/img/ECABINET.jpg"/>
        </div>
        <div class="small-12 text-center column">    
            <br/>
            <p class="text-justify">
                Envoyez-nous votre dossier ou votre question en remplissant le formulaire ci-dessous.
                Votre demande sera traitée à réception et une réponse vous sera apportée dans les meilleurs délais, variables selon la complexité et le volume des documents adressés.
                Si ce délai devait dépasser 48h00 ouvrables, vous en seriez immédiatement informé.
            </p>            
            <br/>
        </div>
        <div class="small-12 column">                                   
            <div id="formresult"></div>
        </div>
        <form id='contactform' method='post' action='<?=get_template_directory_uri()?>/lib/mailer.php'  enctype="multipart/form-data">
            <div class="small-12 medium-6 column"> 

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
                        <label for='email'>Téléphone : </label>
                    </div>
                    <div class="small-12 medium-9 column">
                        <input id="phone" required name='phone' type='tel'>
                    </div>
                </div>

                 <div class="row">
                    <div class="small-12 medium-3 column">
                        <label for='email'>Fichiers à joindre  :</label>
                    </div>
                    
                    <div class="small-12 medium-9 column">                        
                        <input type="file" name="file1[]" id="file1"><br/>                        
                        <input type="file" name="file2[]" id="file2"><br/>                        
                        <input type="file" name="file3[]" id="file3"><br/>                        
                    <div class="progress" role="progressbar" tabindex="0" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                      <div class="progress-meter" style="width: 0%"></div>
                    </div>
                    </div>                
                </div>

            </div>
            <div class="small-12 medium-6 column"> 

                <div class="row">
                    <div class="small-12 medium-3 column">
                        <label for='message'>Message</label>
                    </div>
                    <div class="small-12 medium-9 column">
                        <textarea rows="3" name="message" required></textarea>
                    </div>
                </div>

                <div class="row">                
                    <div class="small-12 small-right medium-9 medium-push-3 column">
                        <div class='g-recaptcha' data-sitekey='6LdQ4hITAAAAAIWjgrgEdP9fk0F7h_BZXLNTQGqc'></div>             
                    </div>                    
                
                    <div class="small-12 medium-9 column">
                        <button class="button" type="submit" name="submit" class="btn btn-info">Envoyer</button>            
                    </div>
                </div>    
            </div>
        </form>
    </div>
</div>
<script src='https://www.google.com/recaptcha/api.js'></script>
<?php get_footer(); ?>