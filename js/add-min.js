function form_check(){$(".form-group .btn_block").click(function(){event.preventDefault();var o={fields:{Location:$('form select[name="location"]').val(),Question:$('form input[name="question"]').val(),Answer:$('form input[name="correct_answer"]').val(),Wrong1:$('form input[name="wrong_answer1"]').val(),Wrong2:$('form input[name="wrong_answer2"]').val(),Wrong3:$('form input[name="wrong_answer3"]').val(),Comments:$('form input[name="explain"]').val()}};console.log(o);var e=0,r=0;for(key in o.fields){if(r++,""==o.fields[key]){console.log(key),"Location"==key&&modal_message("Sorry!","You must provide a valid battle location."),"Question"==key&&modal_message("Sorry!","You must provide a valid question."),"Answer"==key&&modal_message("Sorry!","You must provide a correct answer."),"Wrong1"==key&&modal_message("Sorry!","You must provide three possible answers."),"Wrong2"==key&&modal_message("Sorry!","You must provide three possible answers."),"Wrong3"==key&&modal_message("Sorry!","You must provide three possible answers.");break}e++}})}function modal_message(o,e){$("#myModal .modal-title").html(o),$("#myModal .modal-body").html(e),$("#myModal").modal("show")}$(function(){form_check()});