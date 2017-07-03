/*script to detect when user has clicked on and changed and option from dropdown menu. As such, the remaining fields are auto-filled. See 
http://stackoverflow.com/questions/17155146/how-to-detect-when-a-user-clicks-on-an-option-in-a-drop-down-menu-select-tag
(Misters -1) and http://stackoverflow.com/questions/1085801/get-selected-value-in-dropdown-list-using-javascript */
        
            
$(function(){
    
    // Store copy of array of objects retrieved via AJAX call
    var data = []; 
    
    // Keep track of database status ie empty or filled
    var table; 
    
    // Detects which battle location the user has chosen from the first dropdown menu 
    $("#mySelect").change(function(){
         
        var selected = document.getElementById("mySelect");
        var clicked = selected.options[selected.selectedIndex].text;
        console.log(clicked);
        
        // AJAX call to get questions from database associated with that place name
        var parameters = {
            battle:clicked
        };
        
        $.getJSON("obtain.php", parameters).done(function(data, textStatus, jqXHR) {
          
            data_collection(data); 
        })
            
        .fail(function(jqXHR, textStatus, errorThrown) {
            // log error to browser's console
            console.log(errorThrown.toString());
        });
        
        // Callback executed once AJAX has finished
        function data_collection(array)
        {
            
            // Store copy of data array in global variable
            data = array;
            
            // Now display questions 
            var option = document.getElementById("mySelect2");
            
            // Show nothing for previous 
            option.innerHTML = "";
                           
            // Show ALL questions in drop down menu
            for (var i in array){
                
                if (array[i].Question == "none")
                {
                    var addition = document.createElement("option");
                    addition.value = "no questions available at this time"; 
                    addition.text = "no questions available at this time";
                    option.add(addition);
                    table = "empty";
                    fields(array, null, table); 
                }
                
                else
                {
                    var addition = document.createElement("option");
                    addition.value = array[i].Question; 
                    addition.text = array[i].Question;
                    option.add(addition);
                    table = "filled";
                }
            }
            
            // Show choices associated with question_number = 0
            fields(array, 0, table);
        }
        
    });
    
    // If change question in dropdown menu
    $("#mySelect2").change(function(){
         
        console.log(data); 
         
        var selected = document.getElementById("mySelect2");
        var clicked = selected.options[selected.selectedIndex].text;
        console.log(clicked);
        
        // Now iterate through data array of objects to find question that user clicked
        for (var i in data)
        {
            if (data[i].Question == clicked){
                
                console.log("found question"); 
                table = "filled";
                // fill in fields with choices, answer and explantion
                fields(data, i, table); 
            }
        }
         
    });
    
});

// function for populating fields, as called when user changes selection from dropdown menus
function fields(array, index, table){
    
    // List option ids in array
    var answers = ["wrong_answer1", "wrong_answer2", "wrong_answer3"];
    
    if (table == "filled")
    {
        // Show choices
        for (var i in answers)
        {
            document.getElementById(answers[i]).value = array[index].Choices[i];
            
        }
        
        // Show first exaplanation
        document.getElementById("explain").value = array[index].Explain;
        
        // Show first correct answer 
        document.getElementById("correct_answer").value = array[index].Answer;
        
    }
    
    else if (table == "empty")
    {
        var message = "";
        var extension = ["explain", "correct_answer"];
        extension = answers.concat(extension); 
        
        for (var i in extension)
        {
            document.getElementById(extension[i]).value = message;
        }
        
    }
    
}
            
            
