<?php
    
    // configuration
    require("includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        
        if (!empty($_SESSION["id"]))
        {
            redirect("/");
        }
        
        // else render form
        render("log-in_new.php", ["title" => "Log In"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
       
       /*
        // validate submission
        if (empty($_POST["username"]))
        {
            apologize("You must provide your username.", "login.php");
        }
        
        else if (empty($_POST["password"]))
        {
            apologize("You must provide your password.", "login.php");
        }
        */ 

        // query database for user
        $rows = Database::query("SELECT * FROM `history_maps`. `users` WHERE username = ?", $_POST["username"]);

        // if we found user, check password
        if (count($rows) == 1)
        {
            // first (and only) row
            $row = $rows[0];

            // compare hash of user's input against hash that's in database
            if (password_verify($_POST["password"], $row["hash"]))
            {
                // remember that user's now logged in by storing user's ID in session
                $_SESSION["id"] = $row["id"];

                // redirect back to index.php. The idea with $_SESSION["id"] being filled, the page will not go back to login.php
                redirect("/");
            }
        }

        // else apologize
        apologize("Invalid username and/or password.", "login.php");
    }

?>
