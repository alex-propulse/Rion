
$(function(){

	'use strict';
	init();
	function init(){
		$(document).foundation();	
		if($("#home-menu").length > 0) { 
			$('body').addClass('home');
		}else{
			$('body').removeClass('home');
		}
	}

  	//ajaxify
  	var $page = $('#main'), options = {
	    debug: false,
	    prefetch: false,
	    cacheLength: 2,
	    forms: 'form',
	    onStart: {
	    	duration: 250, // Duration of our animation
	        render: function ($container) {
	            // Add your CSS animation reversing class
	            $container.addClass('is-exiting');
	            // Restart your animation
	            smoothState.restartCSSAnimations();                       
	        }
	    },
	    onReady: {
	        duration: 0,
	        render: function ($container, $newContent) {
	          	// Remove your CSS animation reversing class            
	          	$container.removeClass('is-exiting');
		        // Inject the new content
		        $container.html($newContent);			
		        init();
          	}
		}
    },
    smoothState = $page.smoothState(options).data('smoothState');

    //wow
	var wow = new WOW({
		boxClass:     'wow',      // default
		animateClass: 'animated', // default
		offset:       100,          // default
		mobile:       true,       // default
		live:         true        // default
	})
	wow.init();		



    //preupload
    $('input[type=file]').on('change', prepareUpload);
    function prepareUpload(e){
    	files = e.target.files;
    	file =  files[0];    
    }    

	$('#contactform').submit(function(event) {

		var contactform =  document.getElementById("contactform");
		var formData = new FormData($(this)[0]);
		gotFiles=true;
		
		if($('#file1').val() == $('#file2').val() == $('#file3').val() == ""){
			gotFiles=false;			
		}else{$(".progress").show();}

	    var bar = $('.bar');
	    var percent = $('.percent');
	    var status = $('#status');
	    var xhr = new XMLHttpRequest();

		event.preventDefault();

		$.ajax({
		    url: contactform.getAttribute('action'),
		    type: 'POST',
		    data: formData,		    
		    dataType: 'json',
		    cache: false,
		    xhr: function() {

		        var xhr = new window.XMLHttpRequest();
		        xhr.upload.addEventListener("progress", function(evt) {
		            if (evt.lengthComputable && gotFiles) {
		                var percentComplete = evt.loaded / evt.total;
		                var txtpercent = Math.round(percentComplete*100)+"%";
		                $('.progress-meter').css('width',txtpercent);
		                $('.progress-meter').html(txtpercent);
		                if(txtpercent=="100%" ){
		                	$('.progress-meter').html("fichier(s) envoyé(s)");
		                }		               
		            }
		       }, false);
       			return xhr;
    		},		    
			contentType: false,
			processData: false,
		    success: function (returndata) {
		      switch(returndata){
	        		case 'ok':
	        			$('#formresult').addClass('callout success');
	        			txt_content = "<i class='fa fa-check'></i>Votre message a été envoyé. Merci.";
	        		break;
	        		case 'error-captcha':	        			
	        			$('#formresult').addClass('callout warning');
	        			txt_content = "<i class='fa fa-times fa-2x'></i>Veuillez cocher 'Je ne suis pas un Robot' pour envoyer votre message.";
	        		break;
	        		
	        	}
	        	$('#formresult').html(txt_content);  
		    },
		     error: function(jqXHR, textStatus, errorThrown)
        	{
            	// Handle errors here
            	console.log('ERROR: ' + errorThrown);
            	// STOP LOADING SPINNER
       		},

		  });
		 
		  return false;
		});


});
