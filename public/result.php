<?php
    
    // result.php renders the winning or losing page depending on outcome. Also deletes users scores if wishes to play again
    
    // configuration
    require("../includes/config.php"); 
    
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // Get query string sent from browser 
        $query_string = $_SERVER['QUERY_STRING']; 
        
        // Check to see if scores are filled ie coming from index 11 from map screen
        if (!empty($_GET["British"]) && !empty($_GET["French"]))
        {
            
            if ($_GET["British"] >= $_GET["French"])
            {
                
                // If scores are equal, then provide British victory for simplicity
                $_GET["British"]++; 
                
                // if have more victories up to Vimeiro stage then want to increment index and return to map at Waterloo
                // Hence insert battle index into scores table for this username
                
                $username = get_user(); 
                
                CS50::query("INSERT IGNORE INTO `final project`. `scores` (username, Battle, battle_index, British, French)
                VALUES (?, ?, ?, ?, ?)", $username, "Waterloo", 12, 0, 0);
                
                // Now render correct page
                render("winner.php", ["title" => "Congratulations!", "message" => "Napoleon's marshals have been defeated! The French have been ousted from Spain and the Emperor himself has been exiled from France... for now", 
                "image" => "img/Wells.jpg", "British" => $_GET["British"], "French" => $_GET["French"]]);
                
            }
            
            else if ($_GET["French"] > $_GET["British"])
            {
                
                // Delete scores when return to map to play again
                // Delete all scores for that username
                CS50::query("DELETE FROM `final project` . `scores` WHERE username = ? AND Battle != ?", $username, "Mondego Bay");
                
                //Re-set Mondego Bay to 0-0
                CS50::query("UPDATE `final project`.`scores` SET British = ?, French = ? WHERE Battle = ? AND username = ?", 0, 0, "Mondego Bay", $username);
                
                 render("winner.php", ["title" => "Better luck next time!", "message" => "Napoleon's reign of terror continues...", 
                "image" => "img/Nap.jpg", "British" => $_GET["British"], "French" => $_GET["French"]]);
                
            }
        }  
        
        // If not, then must be coming from index 12 and end of game
        if ($query_string == "British")
        {
            render("winner.php", ["title" => "Congratulations!", "message" => "You have won the game! Napoleon's reign of terror is over!", 
            "image" => "img/Sharpe.jpg", "British" => "undefined", "French" => "undefined"]);
        }
        
        else if ($query_string == "French")
        {
            render("winner.php", ["title" => "Better luck next time!", "message" => "Napoleon's reign of terror continues...", 
            "image" => "img/Nap.jpg", "British" => "undefined", "French" => "undefined"]);
        }
    }
    
    // If clicked link to return to map screen at index 12 (end of game) then POSTS
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // Delete all that usernames scores in order to play campaign again
        
        // Get username 
        $username = get_user(); 
        
        // Delete all scores for that username
        CS50::query("DELETE FROM `final project`.`scores` WHERE username = ? AND Battle != ?", $username, "Mondego Bay");
        
        //Re-set Mondego Bay to 0-0
        CS50::query("UPDATE `final project`.`scores` SET British = ?, French = ? WHERE Battle = ? AND username = ?", 0, 0, "Mondego Bay", $username);
        
        // Once deleted, return to map screen at Mondego Bay
        redirect("scenario.php"); 
    }
    
?>   