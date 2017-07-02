$(function(){

    form_check(); 


}); 

function form_check(){
    $('.form-group .btn_block').click(function(){

		//event.preventDefault();
		
		// See here for how to get form values using jQuery: https://www.formget.com/jquery-get-value-of-input/		
		var fields_list = {fields:{Location:$('form select[name="location"]').val(), Question:$('form input[name="question"]').val(),Answer:$('form input[name="correct_answer"]').val(), Wrong1:$('form input[name="wrong_answer1"]').val(), Wrong2:$('form input[name="wrong_answer2"]').val(), Wrong3:$('form input[name="wrong_answer3"]').val(), Comments:$('form input[name="explain"]').val()}}
		
		console.log(fields_list); 
		
		var filled = 0; 
		var size = 0; 
		
		// Check contents of fields object...
		for (key in fields_list["fields"]) {
			
			size++; 		
          

			if(fields_list["fields"][key] == ''){			 

                console.log(key);	
                if (key == "Location"){
                    modal_message("Sorry!", "You must provide a valid battle location."); 
                }
                if (key == "Question"){
                    modal_message("Sorry!", "You must provide a valid question."); 
                }
                if (key == "Answer"){
                    modal_message("Sorry!", "You must provide a correct answer."); 
                }
                if (key == "Wrong1"){
                    modal_message("Sorry!", "You must provide three possible answers."); 
                }
                if (key == "Wrong2"){
                    modal_message("Sorry!", "You must provide three possible answers."); 
                }
                if (key == "Wrong3"){
                    modal_message("Sorry!", "You must provide three possible answers."); 
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