var files = "";

$(document).ready(function() {	

	//Init Foundation + init reponsive menu
	$(document).foundation();	
	
	$('#slide-home').owlCarousel({
	    items:1,
	    autoplay:true,
	    loop:true,
	    dots: true,
	    autoplayTimeout:3500,
	    dotsContainer: '#customDots',
	      autoHeight:true
	});


	$('#slider-news').owlCarousel({
	    items:1,
	    autoplay:true,
	    loop:true,
	    nav: true,
	    autoplayTimeout:3500,	    
	    navContainer:  '#customNav',
	    navText : ['<i class="fa fa-2x fa-angle-left"></i>','<i class="fa fa-2x fa-angle-right"></i>']
	});

		wow = new WOW({
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

function progressHandlingFunction(evt) {
    console.log('updateProgress');
    alert("test");
    if (evt.lengthComputable) {
            var percentComplete = evt.loaded / evt.total;
            console.log(percentComplete);
    } else {
            // Unable to compute progress information since the total size is unknown
            console.log('unable to complete');
    }
}
/*
	$('#contactform').submit(function(event) {

		var formData = new FormData($(this)[0]);
		event.preventDefault();



		/*

	    

	    var contactform =  document.getElementById("contactform");
	    var formresult = $('#formresult');
	    var data = new FormData(contactform);
	    

	    //if(files.length>0){
		    $.each(files, function(key, value)
		    {
		    	console.log(value);
		    	
	        	data.append(key, value);
	    	});
		//}
    	
/*

    if($('#file1').length>0){
    
  		input = document.getElementById('file1');
  		file = input.files[0]; 
  		formdata.append("file1", file);
		//alert(file.name+" | "+file.size+" | "+file.type);   
	}
	*/
/*
	    $.ajax({
	        type: 'POST',
	        url: contactform.getAttribute('action'),
	        data: formData,

	        async: false,
        	dataType: 'json',
	        
	        processData: false, // Don't process the files
        	contentType: false, // Set content type to false as jQuery will tell the server its a query string request
	        success:function(response) {
	        	$(formresult).removeClass();
	        	txt_content = "";

	        	formresult.addClass('callout success');
       			txt_content = "<i class='fa fa-check'></i>."+response;

	        	switch(response){
	        		case 'ok':
	        			formresult.addClass('callout success');
	        			txt_content = "<i class='fa fa-check'></i>Votre message a été envoyé. Merci.";
	        		break;
	        		case 'error-captcha':
	        			formresult.addClass('callout warning');
	        			txt_content = "<i class='fa fa-times fa-2x'></i>Veuillez cocher 'Je ne suis pas un Robot' pour envoyer votre message.";
	        		break;
	        		
	        	}
	        	formresult.html(txt_content);       	
	        },
              error: function(jqXHR, textStatus, errorThrown)
        	{
            	// Handle errors here
            	console.log('ERROR: ' + errorThrown);
            	// STOP LOADING SPINNER
       		}
       		/*
        	error:function(data) {
        
            	$(formresult).removeClass();
            	$(formresult).addClass('callout warning');
            	$(formresult).html(data);
           	}
        
           	
        });

	});
		*/
});

/*
function uploadFile(){
	
	// alert(file.name+" | "+file.size+" | "+file.type);
	var formdata = new FormData();
	formdata.append("file1", file);
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "file_upload_parser.php");
	ajax.send(formdata);
}


function progressHandler(event){
	var percent = (event.loaded / event.total) * 100;
	_("loaded_n_total").innerHTML = event.loaded+" / "+event.total;	
	_("progressBar").value = Math.round(percent);
	_("status").innerHTML = Math.round(percent)+"% Téléchargement en cours...";
}
function completeHandler(event){
	_("status").innerHTML = event.target.responseText;
	_("progressBar").value = 0;
}
function errorHandler(event){
	_("status").innerHTML = "Le téléchargement a échoué.";
}
function abortHandler(event){
	_("status").innerHTML = "Téléchargement interrompu";
}*/

 function handleFileSelect()
  {               
    if (!window.File || !window.FileReader || !window.FileList || !window.Blob) {
      alert('The File APIs are not fully supported in this browser.');
      return;
    }   

    input = document.getElementById('file1');
    if (!input) {
      alert("Um, couldn't find the fileinput element.");
    }
    else if (!input.files) {
      alert("This browser doesn't seem to support the `files` property of file inputs.");
    }
    else if (!input.files[0]) {
      alert("Please select a file before clicking 'Load'");               
    }
    else {
      file = input.files[0];
      fr = new FileReader();
      fr.onload = receivedText;
      //fr.readAsText(file);
      fr.readAsDataURL(file);
    }
  }

    function receivedText() {
    document.getElementById('editor').appendChild(document.createTextNode(fr.result));
  }       