function fields(e,o,n){var t=["wrong_answer1","wrong_answer2","wrong_answer3"];if("filled"==n){for(var a in t)document.getElementById(t[a]).value=e[o].Choices[a];document.getElementById("explain").value=e[o].Explain,document.getElementById("correct_answer").value=e[o].Answer}else if("empty"==n){var l="",r=["explain","correct_answer"];r=t.concat(r);for(var a in r)document.getElementById(r[a]).value=l}}function form_check(){$(".form-group .btn_block").click(function(){event.preventDefault();var e={fields:{Location:$('form select[name="location"]').val(),Question:$('form input[name="question"]').val(),Answer:$('form input[name="correct_answer"]').val(),Wrong1:$('form input[name="wrong_answer1"]').val(),Wrong2:$('form input[name="wrong_answer2"]').val(),Wrong3:$('form input[name="wrong_answer3"]').val(),Comments:$('form input[name="explain"]').val()}};console.log(e);var o=0,n=0;for(key in e.fields){if(n++,""==e.fields[key]||void 0==e.fields[key]){console.log(key),"Location"==key&&modal_message("Sorry!","You must provide a valid battle location."),"Question"==key&&modal_message("Sorry!","You must provide a valid question."),"Answer"==key&&modal_message("Sorry!","You must provide a correct answer."),"Wrong1"==key&&modal_message("Sorry!","You must provide three possible answers."),"Wrong2"==key&&modal_message("Sorry!","You must provide three possible answers."),"Wrong3"==key&&modal_message("Sorry!","You must provide three possible answers.");break}o++}})}function modal_message(e,o){$("#myModal .modal-title").html(e),$("#myModal .modal-body").html(o),$("#myModal").modal("show")}$(function(){form_check();var e=[],o;$("#mySelect").change(function(){function n(n){e=n;var t=document.getElementById("mySelect2");t.innerHTML="";for(var a in n)if("none"==n[a].Question){var l=document.createElement("option");l.value="no questions available at this time",l.text="no questions available at this time",t.add(l),o="empty",fields(n,null,o)}else{var l=document.createElement("option");l.value=n[a].Question,l.text=n[a].Question,t.add(l),o="filled"}fields(n,0,o)}var t=document.getElementById("mySelect"),a=t.options[t.selectedIndex].text;console.log(a);var l={battle:a};$.getJSON("obtain.php",l).done(function(e,o,t){n(e)}).fail(function(e,o,n){console.log(n.toString())})}),$("#mySelect2").change(function(){console.log(e);var n=document.getElementById("mySelect2"),t=n.options[n.selectedIndex].text;console.log(t);for(var a in e)e[a].Question==t&&(console.log("found question"),o="filled",fields(e,a,o))})});