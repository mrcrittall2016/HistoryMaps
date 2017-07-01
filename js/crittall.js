
$(function(){

    // Basic page functions
    //return_to_top();    
    mobile_menu();                   
	
    /*
	// If in on home page 
	if ($('div').hasClass('supporting-2')){
				
		click_link();
		email_me(); 
		
	}
    */   

    /*
    // Portfolio page 
    if ($('div').hasClass('portfolio')){

       portfolio_image(); 
        
    }
    */ 

 }); 
 
 // Returns user to top of page if click on return arrow 
 function return_to_top(){

        // Keep return icon hidden until beyond a certain distance
        $('.return').css("display", "none");   

        // Keep checking scrollbar position
        $(window).scroll(function(){      

            if ($(window).scrollTop() > 200){
                $('.return').fadeIn("slow");
            }

            else {
                //$('.return').css("display", "none");
                $('.return').fadeOut("slow");
            }                  
            
        }); 

        // Return user to top of page if click on return button
        $('.return').click(function(){

            $('html, body').animate({scrollTop:0}, 900); 

        }); 

 }

 // Smoothe scrolls user to different part of page depending on link clicked
 function click_link(){
    
    // If click on link in menu 
    $('.menu li a, .mobile_menu li a').click(function(){


        //alert($(this).html()); 
        if (this.hash !== "") {  

            // Prevent default anchor click behavior
            event.preventDefault();

            var id = this.hash;            

            // Scroll to relevant position
            var offset = $(id).offset().top; 

            $('html, body').animate({ scrollTop: offset }, 900); 
                
        }

    });
 }

 // Displays mobile menu when click on bars
 function mobile_menu(){

    // If click on three-bar glyphicon
    $('i.fa-bars').click(function(){

        //$('#myModal').modal("show");
        //$('.white_block').slideDown("fast");
        $('.dialogue-primary').animate({height:'175px'}, "fast"); 

        // Make monile_menu appear 
        $('.mobile_menu-primary').css("display", "block"); 
        
        // Want to now scroll down to focus on Portfolio link      
        //$('html, body').animate({ scrollTop: $('.mobile_menu li:nth-of-type(1)').offset().top }, 900); 
       // $('html, body').animate({ scrollTop: 200 }, 900);

        $(this).css("display", "none"); 
        $('i.fa-long-arrow-up').css("display", "block"); 

        $('i.fa-long-arrow-up').click(function(){
            //$('.white_block').slideUp("fast"); 

            // Only make mobile menu disappear again once have contracted window 
            $('.dialogue-primary').animate({height:'0px'}, "fast", function(){
                $('.mobile_menu-primary').css("display", "none");
            }); 
            $(this).css("display", "none");             
            $('i.fa-bars').css("display", "block"); 
            //$('html, body').animate({ scrollTop: 0 }, 900);
        });
        
    });
 }
 
 // Displays information regarding different projects on portfolio page when click on image
 function portfolio_image(){

    // Use CSS selector to target portfolio images
    $('.portfolio .col-md-6 a').click(function(){
        
        var image = ($(this).attr("id"));                    
        
        for (var i in portfolio){                       
            
            if (portfolio[i].title == image){                          
                
                // Now set parameters of modal below to title, description and link...
                $('.modal-title').html(portfolio[i].title); 
                $('.modal-body').html(portfolio[i].description); 
                $('.modal-footer').html(portfolio[i].link); 
            }

        }                   

    });

 }
 
// Function to enable email to be sent to me 
// If user wants to email me...
function email_me(){

  $('.glyphicon-chevron-right').click(function(){

		event.preventDefault();		

		// Ajax call here... depending on result show different modal content		
		
		// See here for how to get form values using jQuery: https://www.formget.com/jquery-get-value-of-input/		
		var fields_list = {fields:{Name:$('form input[name="name"]').val(), Email:$('form input[name="email"]').val(), Subject:$('form input[name="subject"]').val(), Message:$('form textarea[name="message"]').val()}}
		
		console.log(fields_list); 
		
		var filled = 0; 
		var size = 0; 
		
		// Check contents of fields object...
		for (key in fields_list["fields"]) {
			
			size++; 
			
			if(fields_list["fields"][key] == ''){			 
							
				modal_message("Sorry", "Please ensure all fields are filled before sending");  					
				break; 						
				
			}			
			
			filled++; 
		
		}
		
		
		// If all fields are filled 
		if (filled == size){
		 
				
			$.getJSON("contact.php", fields_list).done(function(data, textStatus, jqXHR){
			
				  // Check data returned successfully 
				  console.log(data);
			  
			  
				  if (data == true){
				  
						// Now show congrats message						
						modal_message("Congratulations", "Your message has been sent successfully!"); 
						
						// Now clear all fields					
						$('form input').val(''); 
						$('form textarea').val(''); 
				  }
			  
				  else if (data == false){
				  
					  					
					  modal_message("Technical difficulties", "Please try again later");  
					  
					  // Now clear all fields
					  $('form input').val(''); 
					  $('form textarea').val(''); 
					  
				  }
			  
			  
			})
			
			.fail(function(jqXHR, textStatus, errorThrown) {
				// log error to browser's console
				console.log(errorThrown.toString());
			});
		
		}
	
	});
}

// Function called by email_me() to show different modal messages
function modal_message(title, body){
	
	  $('#myModal .modal-title').html(title); 
	  $('#myModal .modal-body').html(body); 
	  $('#myModal .modal-body').css("text-align", "center");
	  $('#myModal').modal("show");

} 
 
 
 
 
 
 