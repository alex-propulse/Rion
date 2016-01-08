<?php get_header(); 
global $post;
$postName = $post->post_name;
$postTitle =get_the_title($post->ID);
$url_img = get_template_directory_uri()."/img/cabinet/";
?>

<div class="page-content" id="page-<?=$postName?>" >

    <div class="row">
        <!--RSOULARD-->
        <div class="small-12 medium-6 columns portrait">
            <div class="row">
                <div class="frame">
                    <div class="text-center">
                        <img class="img-portrait" src="<?=$url_img?>PORTRAIT_SOULARD.png">
                        <h1>Florent Soulard</h1>
                    </div>
            
                    <div class="row text-center padding-top">
                        <div class="small-6 columns text-right">
                            <img src="<?=$url_img?>PORTRAIT_SOULARD_NAISSANCE.png">
                        </div>
                        <div class="small-6 text-left columns">
                            <span>1970</span>
                            <br/>Naissance
                        </div>            
                    </div>

                    <div class="row">
                        <div class="small-5 columns text-center border-right">
                            <img src="<?=$url_img?>PORTRAIT_SOULARD_MAITRISE_DROIT_PRIVE.png">                
                            <br/><span>1993</span>
                            <br/>
                             Maitrise<br/>de droit privé                
                             <br/><br/>
                        </div>
                        <div class="small-7 columns text-center">
                            <span>1994</span>
                            <br/>
                             DEA Sciences<br/>juridiques et politiques
                             <br/>
                            <img src="<?=$url_img?>PORTRAIT_SOULARD_DEA.png"> 
                        </div>            
                    </div>
                    <div class="row ">
                        <div class="small-4 columns text-right  border-top ">
                            <br/>
                            <img src="<?=$url_img?>PORTRAIT_SOULARD_DIPLOME_DROIT.png">            
                        </div>
                        <div class="small-8 columns text-center border-top ">
                            <br/>
                            <span>1997</span>
                            <br/>
                             Diplôme de droit et<br/>pratique de la procédure d'appel                 
                         </div>
                    </div>
                </div>
            </div>
        </div>

        <!--RAIMBAULT-->
        <div class="small-12 medium-6 columns portrait">
            <div class="row">
                <div class="frame">
                    <div class="text-center">
                        <img class="img-portrait" src="<?=$url_img?>PORTRAIT_RAIMBAULT.jpg">
                        <h1>Marie Raimbault</h1> 
                    </div>
                    <div class="row">
                        <div class="small-5 columns text-center">
                             <img src="<?=$url_img?>PORTRAIT_RAIMBAULT_NAISSANCE.png">
                             <br/><span>1981</span>
                             <br/>Naissance
                        </div>
                        <div class="small-7 columns text-center border-left">
                            <span>1999-2003</span><br/>
                             Maîtrise de droit privé mention droit international
                            <br/><img src="<?=$url_img?>PORTRAIT_RAIMBAULT_DROIT_INTERNATIONAL.png">
                            
                        </div>         
                    </div>
                    <div class="row border-top">
                        <div class="small-9 columns text-center">                    
                            <span>2004</span>
                            <br/> DEA droit de l'Economie et des Affaires Européennes et Internationales
                        </div>
                        <div class="small-3 columns text-left">
                            <img src="<?=$url_img?>PORTRAIT_RAIMBAULT_DEA.png">
                        </div>
                    </div>
                    <div class="row border-top">
                        <div class="small-6 columns text-center border-right">
                            <img src="<?=$url_img?>PORTRAIT_RAIMBAULT_CERTIFICAT.png">
                            <br/><span>2005</span>
                            <br/> Certificat d'Aptitude à la Profession d'Avocat
                        </div>
                        <div class="small-6 text-center columns">
                            <span>2015</span>
                            <br/>Certificat de spécialisation en droit du travail
                            <br/><img src="<?=$url_img?>PORTRAIT_RAIMBAULT_DROIT_TRAVAIL.png">                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-12 columns portrait">
            <div class="row">
                <div class="frame frame-bottom">
                    <div class="small-12 medium-5 columns">
                        <img class="img-portrait" src="<?=$url_img?>PORTRAIT_FLAGET.jpg">
                    </div>
                    <div class="small-12 medium-7 columns">
                        <h1>Marielle FLAGET</h1>
                        <p class="text-justify">Ancienne clerc d’Avoué, Marielle FLAGET travaille avec Florent SOULARD depuis sa prestation de serment en 1999. Elle est une assistante expérimentée et rigoureuse et sera votre interlocutrice privilégiée.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>