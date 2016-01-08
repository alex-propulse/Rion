<?php
require("./form/swift_required.php");

/* Paramétrage d'envoi des mails */
$mailTo = array("alexis@propulse.fr","marion@propulse.fr");
$object = "Nouveau message du site Soulard et Raimbault";
$logo = "http://sr.studiopropulse.com/wp-content/themes/propulse-avocats/img/logo_sr.png";
$site_url = "http://sr.studiopropulse.com";
$site_name = "www.soulard-raimbault.com";
$uploaddir = '../../../uploads/fom_attachments/';
$linkdir = $site_url."/wp-content/uploads/fom_attachments/";

/* Paramétrage d'envoi des confirmations */
$mailfrom_c = "contact@soulard-raimbault.com";
$object_c = "Merci pour votre message sur le site Soulard et Raimbault";
$content_c .= "<div style='text-align:center;width:100%'><img src='".$logo."'><br/>";
$content_c .= "Nous avons bien reçu votre message sur le site <a href='".$site_url."'>".$site_name."</a> <br/>";
$content_c .= "Nous allons le traiter au plus vite.<br/><br/>Merci.</div>";
 
 if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
	$data = array();	

	$mailBcc = "";
	$name = trim($_POST["username"]);
	$phone = trim($_POST["phone"]);
	$mailfrom = $_POST["e-mail"];	
	$message = trim($_POST["message"]);

	$content ="<div style='text-align:center;width:100%'>";	
	$content .= "<img src='".$logo."'><br/>";
	$content .= "<strong>Nom</strong> : ".$name."<br/>";
	$content .= "<strong>E-mail</strong> : ".$mailfrom."<br/>";
	$content .= "<strong>Téléphone</strong> : ".$phone."<br/>";
	$content .= "<strong>Message</strong> : ".$message."<br/>";

	/*S'il y a des pièces jointes*/
	if(isset($_FILES['file1']))
	{  				
		$error = false;
		$files = $_FILES['file1'];
	  
	    foreach($_FILES as $file)
	    {
	    	//var_dump($file);
	    	$tmp_name = $file['tmp_name'][0];
	    	$name = $file['name'][0];

	        if(move_uploaded_file($tmp_name, $uploaddir.$name))
	        {
	            $files_uploaded[] = array("url"=>$linkdir.$name,"name"=>$name);
	        }
	        else
	        {
	            $error = true;
	        }
	    }
	    $data = ($error) ? array('error' => 'There was an error uploading your files') : array('files' => $files);

	   	if(count($files_uploaded)>0)
	   	{
	    	$content .="<p>Des pièces ont été ajoutées au formulaire :</p>";
	    	$content .="<ul>";
	    	foreach($files_uploaded  as $file_uploaded)
		    {
		    	$content .= "<li><a download href='".$file_uploaded['url']."'>".$file_uploaded['name']."</a></li>";	    
		    }
		    $content .="<ul>";
		}
	}

	$content .="</div>";

	if(isset($_POST['g-recaptcha-response'])){
		$captcha = $_POST['g-recaptcha-response'];
	}	

	//Validate the data		
	if (empty($captcha)) {	
		echo(json_encode('error-captcha'));					
	}else{		
	

		$transport = Swift_SmtpTransport::newInstance('propulse.fr', 25);
		$transport->setUsername('formulaires@propulse.fr');
		$transport->setPassword('5vC5V2M20Ie01y');
		$mailer = Swift_Mailer::newInstance($transport);		

		//mail au destinataire		
		$mail_instance = Swift_Message::newInstance($object);
		$mail_instance->setFrom($mailfrom);		
		$mail_instance->setTo($mailTo);
		$mail_instance->setBody($content, 'text/html');	
		$mailer->send($mail_instance);

		//confirmation à l'envoyeur	
		$mail_conf = Swift_Message::newInstance($object_c);
		$mail_conf->setFrom($mailfrom_c);		
		$mail_conf->setTo(array($mailfrom));
		$mail_conf->setBody($content_c, 'text/html');	
		$mailer->send($mail_conf);
		echo(json_encode('ok'));

	
	}
	
		

}

?>