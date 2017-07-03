<?php
    
    // Unfortunately if browser has cached one of pages then, remembers this page and does not go back to the server
    // via GET request. Thus session variables retain their previous values and/or are not recognised when send POST request
    // Possibly need to check if page has been cached as separate loop. Got around this last time by using "inspect element"
    // and disabling then enabling cache ie ticking/unticking box in network tab
    // See here for more details: https://www.mnot.net/cache_docs/. Possibly use no-cache header 
    // This is what screwed it up in the first place: http://stackoverflow.com/questions/19215637/navigate-back-with-php-form-submission
    // Generally need to figure out what to display/do if user hits back button in browser... 
    
    
    // configuration
    require("../includes/config.php"); 
    
    
    // enable $_SESSION so can store questions with choices and answer in so can access from POST request 
    // Note: Possibly put this into config file as pset7 does
    @session_start();
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        
        // Retrieve latest battle index
        $rows = CS50::query("SELECT * FROM `final project`. `users`ORDER BY id DESC LIMIT 1");
        
        $_SESSION["battle_index"] = $rows[0]["battle_index"];
        
        // Get query string sent from browser 
        $query_string = $_SERVER['QUERY_STRING'];  
        
        // remove special characters
        $_SESSION["location"] = urldecode($query_string);
        
       
        // Now we have the name of the battle that the user clicked on, we need to query the SQL database 
        // to return a list of random questions (play over 5 rounds ie 5 questions each?) related to that place. Questions could be divided into French perspective
        // and English perspective...so two classmates can play against each other to determine which colour the battle flag turns
        
        
        $rows = CS50::query("SELECT * FROM `final project` . `{$_SESSION["location"]}`"); 
        
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
            "Choices" => [$row["choice1"], $row["choice2"], $row["choice3"]]]; 
            $question_number++; 
        }
        
        // Keep track of number of questions
        $_SESSION["number_of_questions"] = $question_number; 
        
        // All questions for this battle recorded in global sessions variable
        $_SESSION["questions"] = $questions; 
        
        // Keep track of question number
        $_SESSION["question_number"] = 0;
        
        // Keep track of questions answered
        $_SESSION["answered"] = 0; 
        
        // Set scores
        $_SESSION["British"] = 0;
        $_SESSION["French"] = 0; 
        
        // Pick out question to send to first view
        $question = $_SESSION["questions"][$_SESSION["question_number"]];
        
        //var_dump($question); 
        
        // Now render page passing current question
        render("question.php", ["title" => $_SESSION["location"], "question" => $question]);
       
    }
    
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // Every time submit form, a question is answered so update the session variable 
        $_SESSION["answered"]++; 
        
        //var_dump($_SESSION["answered"]);
        
        // Check if that was the last question answered. If so, increment score if answer was correct and redirect to victory view
        if ($_SESSION ["answered"] >= $_SESSION["number_of_questions"])
        {
            if ($_POST["optradio"] == $_SESSION["questions"][$_SESSION["question_number"]]["Answer"])
            {
                if ($_POST["submit"] == "British")
                {
                    if ($_SESSION["British"] + $_SESSION["French"] != $_SESSION["number_of_questions"])
                    {
                        $_SESSION["British"]++;
                    }
                }
                
                else if ($_POST["submit"] == "French")
                {
                    if ($_SESSION["British"] + $_SESSION["French"] != $_SESSION["number_of_questions"])
                    {
                        $_SESSION["French"]++;
                    }
                }
            }
            
            //echo "You have answered ". $_SESSION ["answered"]. " questions";
            //var_dump ($_SESSION["questions"][$_SESSION["question_number"]]["Answer"]);
            //var_dump ($_POST["optradio"]);
            
            echo "British = " .  $_SESSION["British"]. "\n";  
            echo "French = " .  $_SESSION["French"]. "\n";
            
            // Store scores for this location in SQL table. Use INSERT IGNORE if duplicate battle. Then render victory page. When user clicks return to map, Javascript
            // asks separate PHP page what scores were for that location via AJAX. Updates global variables. Depending on result, change icon to respective flag
            
            // increment battle_index
            $_SESSION["battle_index"]++; 
            
            var_dump($_SESSION["battle_index"]); 
            
            CS50::query("INSERT INTO `final project` . `users`(username, Battle, battle_index, British, French) 
            VALUES (?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE id=id", "Matthew", $_SESSION["location"], $_SESSION["battle_index"], $_SESSION["British"], $_SESSION["French"]);
            
            render("victory.php", ["title" => "Badajoz", "British_score" => $_SESSION["British"], "French_score" => $_SESSION["French"]]);
           
        }
        
        // Possibly do not need isset as one radio button will always be highlighted so impossible to submit empty form
        
        if (isset($_POST["submit"]))
        {
            
            if ($_POST["optradio"] == $_SESSION["questions"][$_SESSION["question_number"]]["Answer"])
            {
                // Increment to get next question number as long as not equal to number of questions - 1 ie stops over-indexing
                if ($_SESSION["question_number"] < $_SESSION["number_of_questions"] - 1)
                {
                    $_SESSION["question_number"]++; 
                } 
                
                // Prepare next question
                $question = $_SESSION["questions"][$_SESSION["question_number"]]; 
                
                // If last submission was British or French render opposite view
                if ($_POST["submit"] == "British")
                {
                    if ($_SESSION["British"] + $_SESSION["French"] != $_SESSION["number_of_questions"])
                    {
                        $_SESSION["British"]++;
                    }
                    
                    render("french.php", ["title" => "Badajoz", "question" => $question]);
                }
                
                else if ($_POST["submit"] == "French")
                {
                    if ($_SESSION["British"] + $_SESSION["French"] != $_SESSION["number_of_questions"])
                    {
                        $_SESSION["French"]++;
                    }
                    
                    render("english.php", ["title" => "Badajoz", "question" => $question]);
                }
            }
            
            // Possibly just enough to use 'else' and not 'else if' 
            else if ($_POST["optradio"] != $_SESSION["questions"][$_SESSION["question_number"]]["Answer"])
            {
               
                // Increment to get next question number as long as not equal to number of questions - 1 ie stops over-indexing
                if ($_SESSION["question_number"] != $_SESSION["number_of_questions"] - 1)
                {
                    $_SESSION["question_number"]++; 
                }
                
                // Prepare next question. Uses same code as above if loop so perhaps create general function
                $question = $_SESSION["questions"][$_SESSION["question_number"]]; 
                
                // If last submission was British or French render opposite view
                if ($_POST["submit"] == "British")
                {
                    render("french.php", ["title" => "Badajoz", "question" => $question]);
                }
                
                else if ($_POST["submit"] == "French")
                {
                    render("english.php", ["title" => "Badajoz", "question" => $question]);
                }
               
            }
        }
        
        else
        {
            echo "Please submit the form.";
        }
        
    }
    
?>
