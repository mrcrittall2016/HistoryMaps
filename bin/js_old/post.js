//Javascript to enable href to be submitted as POST rather than GET 

$(function(){
    
    document.getElementById("questions").onclick=function() {
        
        var myForm = document.createElement("form");
        myForm.action=this.href;// the href of the link
        myForm.open="quiz.php";
        myForm.method="POST";
        myForm.submit();
        return false; // cancel the actual link
    }
}); 
