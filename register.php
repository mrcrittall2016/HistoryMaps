<?php

    // configuration
    require("includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("register_new.php", ["title" => "Register"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        /*
        // validate submission
        if (empty($_POST["username"]))
        {
            apologize("You must provide your username.", "register.php");
        }
        
        else if (empty($_POST["institution"]))
        {
            apologize("You must provide an instiution name", "register.php"); 
        }
        
        else if (empty($_POST["password"]))
        {
            apologize("You must provide your password.", "register.php");
        }
        
        else if ($_POST["password"] != $_POST["confirmation"])
        {
            apologize("Passwords do not match.", "register.php");
            
        }
        
        else if (empty($_POST["email_address"]))
        {
            apologize("Please enter a valid email address.", "register.php");
        }
        */ 
        
        // If user seeks administrator privileges first check that has not already assigned to another user 
        if ($_POST["optradio"] == "yes")
        {
            
            // Get all rows for new user's institution to check have not already been assigned administrator rights
            $rows = Database::query("SELECT * FROM `history_maps` . `users` WHERE institution = ?", $_POST["institution"]); 
            
            // If result is not false ie another user is from the same institution
            if ($rows)
            {
                foreach($rows as $row)
                {
                    if ($row["admin"] == "yes")
                    {   
                        apologize("Administrator privileges have already been assigned for this institution.", "register.php"); 
                    }
                }
            }
            
            
            // If administrator privileges not assigned then can input into database
            $result = Database::query("INSERT IGNORE INTO `history_maps`. `users` (username, institution, email_address, hash, admin) 
            VALUES(?, ?, ?, ?, ?)", $_POST["username"], $_POST["institution"], $_POST["email_address"], password_hash($_POST["password"], PASSWORD_DEFAULT), "yes");
            
            
            // Check for duplicate username
            if ($result == false)
            {
                apologize("This username is already taken. Please choose another.", "register.php"); 
            }
            
            // Get session id
            $rows = Database::query("SELECT LAST_INSERT_ID() AS id");
            $id = $rows[0]["id"];
            
            $_SESSION["id"] = $id;
            
            // Lastly, insert battle index into scores table for this username
            $rows = Database::query("INSERT IGNORE INTO `history_maps`. `scores` (username, Battle, battle_index, British, French)
            VALUES (?, ?, ?, ?, ?)", $_POST["username"], "Mondego Bay", 0, 0, 0);
            
            redirect("/");
            
        }
        
        // Insert new users info in users table 
        $result = Database::query("INSERT IGNORE INTO `history_maps`. `users` (username, institution, email_address, hash) 
        VALUES(?, ?, ?, ?)", $_POST["username"], $_POST["institution"], $_POST["email_address"], password_hash($_POST["password"], PASSWORD_DEFAULT));
        
        // Check for duplicate username
        if ($result == false)
        {
            apologize("This username is already taken. Please choose another.", "register.php"); 
        }
        
        // Get session id
        $rows = Database::query("SELECT LAST_INSERT_ID() AS id");
        $id = $rows[0]["id"];
        
        $_SESSION["id"] = $id; 
        
        // Lastly, insert battle index into scores table for this username
        $rows = Database::query("INSERT IGNORE INTO `history_maps`. `scores` (username, Battle, battle_index, British, French)
        VALUES (?, ?, ?, ?, ?)", $_POST["username"], "Mondego Bay", 0, 0, 0);
        
        redirect("/");
    
    }

?>