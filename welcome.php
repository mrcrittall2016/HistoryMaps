<?php

    // configuration
    require("includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("welcome_new.php", ["title" => "Log In"]);
    }
    
?>