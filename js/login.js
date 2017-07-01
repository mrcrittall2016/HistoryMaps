$(function(){

    form_check(); 


}); 

function form_check(){
    $('.form-group .btn_block').click(function(){

		//event.preventDefault();
		
		// See here for how to get form values using jQuery: https://www.formget.com/jquery-get-value-of-input/		
		var fields_list = {fields:{Username:$('form input[name="username"]').val(), Password:$('form input[name="password"]').val()}}
		
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
                if (key == "Password"){
                    modal_message("Sorry!", "You must provide your password."); 
                }
									
				break; 						
				
			}			
			
			filled++; 
		
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