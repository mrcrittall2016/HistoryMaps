$(function(){

    form_check(); 


}); 

function form_check(){
    $('.form-group .btn_block').click(function(){

		//event.preventDefault();
		
		// See here for how to get form values using jQuery: https://www.formget.com/jquery-get-value-of-input/		
		var fields_list = {fields:{Username:$('form input[name="username"]').val(), Institution:$('form input[name="institution"]').val(), Password:$('form input[name="password"]').val(), Confirm:$('form input[name="confirmation"]').val(), Email:$('form input[name="email_address"]').val()}}
		
		console.log(fields_list); 
		
		var filled = 0; 
		var size = 0; 
		
		// Check contents of fields object...
		for (key in fields_list["fields"]) {
			
			size++; 		
          

			if(fields_list["fields"][key] == ''){			 

                console.log(key);	
                if (key == "Username"){
                    modal_message("Sorry!", "You must provide your username."); 
                }
                if (key == "Institution"){
                    modal_message("Sorry!", "You must provide an institution name"); 
                }
                if (key == "Password"){
                    modal_message("Sorry!", "You must provide your password."); 
                }
                if (key == "Confirm"){
                    modal_message("Sorry!", "Passwords do not match."); 
                }
                if (key == "Email"){
                    modal_message("Sorry!", "Please enter a valid email address."); 
                }
									
				break; 						
				
			}
			
			filled++; 
		
		}
		
		if (fields_list["fields"]["Password"] != fields_list["fields"]["Confirm"]){
		    modal_message("Sorry!", "Passwords do not match!"); 
		    // Ensure do not count as filled field if passwords do not match 
		    filled--; 
		    event.preventDefault();
		}
		
		if (filled != size){
		    event.preventDefault();
		}
		
    }); 
}

// Function called by email_me() to show different modal messages
function modal_message(title, body){
	
	  $('#myModal .modal-title').html(title); 
	  $('#myModal .modal-body').html(body); 
	  /*$('#myModal .modal-body').css("text-align", "center");*/ 
	  $('#myModal').modal("show");

} 