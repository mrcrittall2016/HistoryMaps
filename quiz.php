<?php
    
    // quiz.php is called from the info window of scripts.js (attached to the view, map.php)
    
    // configuration
    require_once("includes/config.php"); 
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // Get username 
        $username = get_user(); 
        
        // Now obtain rows relevant only to that username and order by battle index
        $_SESSION["battle_index"] = battle_index($username);
        
        // Get query string sent from browser 
        $query_string = $_SERVER['QUERY_STRING'];
       
        // remove special characters
        $_SESSION["location"] = urldecode($query_string);
      
        // Now we have the name of the battle that the user clicked on, we need to query the SQL database 
        // to return a list of questions.
        
        $rows = Database::query("SELECT * FROM `history_maps` . `{$_SESSION["location"]}`"); 
        
        if ($rows < 1)
        {
            echo "There is no question in the database";
            exit();
        }
        
        $question_number = 0;
        
        // A single array containing each question with key-value pairs 
        foreach($rows as $row)
        {
            $questions [] = ["Number" => $question_number, "Question" => $row["name"], "Answer" => $row["answer"], 
            "Choices" => [$row["choice1"], $row["choice2"], $row["choice3"]], "explain" => $row["explanation"]]; 
            $question_number++; 
        }
        
        // Keep track of number of questions
        $_SESSION["number_of_questions"] = $question_number; 
        
        // All questions for this battle recorded in global sessions variable
        $_SESSION["questions"] = $questions; 
        
        // Keep track of question number and use separate variable for indexing explanations for correct/incorrect page 
        $_SESSION["question_number"] = 0; //$_SESSION["ex_index"] = 0; 
        
        // Keep track of questions answered
        $_SESSION["answered"] = 0; 
        
        // Set scores
        $_SESSION["British"] = 0; $_SESSION["French"] = 0; 
        
        // Pick out question to send to first view
        $question = $_SESSION["questions"][$_SESSION["question_number"]];
        
        // Now render page passing current question
        render("question_new.php", ["title" => $_SESSION["location"], "question" => $question, "answered" => $_SESSION["answered"]]);
    
    }
    
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        // Check if that was the last question answered. If so, increment score if answer was correct and redirect to victory view
        if ($_SESSION ["answered"] >= $_SESSION["number_of_questions"])
        {
            // If answer matches correct answer 
            if ($_SESSION["value"] == "correct")
            {
                increment("British"); 
            }
            
            // If answer does not match correct answer and hence is wrong
            else if ($_SESSION["value"] == "incorrect")
            {
                increment("French"); 
            }
            
            // Store scores for this location in SQL table. Use INSERT IGNORE if duplicate battle. Then render victory page. When user clicks return to map, Javascript
            // asks separate PHP page what scores were for that location via AJAX. Updates global variables. Depending on result, change icon to respective flag
            
            // If location is first location ie Mondego Bay OR last location ie Waterloo, just update instead of inserting new entry and do not increment battle index
            if ($_SESSION["location"] == "Mondego Bay" || $_SESSION["location"] == "Waterloo")
            {
                // Need to make sure only update scores for that username
                $username = get_user();
                        
                Database::query("UPDATE `history_maps`.`scores` SET British = ?, French = ? WHERE Battle = ? AND username = ?", $_SESSION["British"], $_SESSION["French"], $_SESSION["location"], $username); 
                
                render("victory_new.php", ["title" => $_SESSION["location"], "British_score" => $_SESSION["British"], "French_score" => $_SESSION["French"]]);
            }
            
            // increment battle_index
            $_SESSION["battle_index"]++; 
            
            // Get username 
            $username = get_user();
            
            // Insert all results into mySQL database for this location
            Database::query("INSERT INTO `history_maps` . `scores`(username, Battle, battle_index, British, French) 
            VALUES (?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE id=id", $username, $_SESSION["location"], $_SESSION["battle_index"], $_SESSION["British"], $_SESSION["French"]);
            
            render("victory_new.php", ["title" => $_SESSION["location"], "British_score" => $_SESSION["British"], "French_score" => $_SESSION["French"]]);
           
        }
        
        // Check to see if coming back from correct or incorrect.php
        if (!isset($_POST["optradio"]) && ($_SESSION["value"] == "correct" || $_SESSION["value"] == "incorrect"))
        {
           
            render("question_new.php", ["title" => $_SESSION["location"], "question" => $_SESSION["question"], "answered" => $_SESSION["answered"]]);
            
        }
        
        // Else coming from question.php
        else
        {
            // If answer submitted is correct 
            if ($_POST["optradio"] == $_SESSION["questions"][$_SESSION["question_number"]]["Answer"])
            {
                prepare("British", "correct");
            }
            
            // If answer is incorrect  
            else if ($_POST["optradio"] != $_SESSION["questions"][$_SESSION["question_number"]]["Answer"])
            {
                prepare("French", "incorrect");  
            }
            
        }
      
    }
   
    // function to prepare next question and increment score if correct/incrorrect
    function prepare($nation, $result)
    {
        // Store explanation for past question before incrementing question number 
        $_SESSION["explain"] = $_SESSION["questions"][$_SESSION["question_number"]]["explain"];
        
        // Increment to get next question number as long as not equal to number of questions - 1 ie stops over-indexing
        if ($_SESSION["question_number"] != $_SESSION["number_of_questions"] - 1)
        {
            $_SESSION["question_number"]++; 
        }
        
        // Prepare next question
        $_SESSION["question"] = $_SESSION["questions"][$_SESSION["question_number"]];
      
        // Increment score
        increment($nation); 
        
        // render explanation and submit to view 
        render($result.".php", ["title" => $_SESSION["location"], "explain" => $_SESSION["explain"]]);
    }
    
    // Function to increment score
    function increment($nation)
    {
        // Check that have not already completed quiz and hit back button on browser
        if ($_SESSION["British"] + $_SESSION["French"] != $_SESSION["number_of_questions"])
        {
            $_SESSION[$nation]++;
        }
    }
?>
