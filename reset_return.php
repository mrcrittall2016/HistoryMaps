<?php
    
    // This file comes into play when the user wants to reset their password by clicking on the link in the email sent to them from reset.php 
 
    // configuration
    require("includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("reset_email.php", ["title" => "Password Reset"]);
    }
    
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["reset"]))
        {
            apologize("Please enter a password.", "reset_return.php");
        }
        
        // check email address exists 
        $return = Database::query("SELECT email_address FROM `history_maps`. `users` WHERE email_address = ?", $_SESSION["email"]); 
        
        if($return == false)
        {
            apologize("that email address does not exist.", "reset_return.php"); 
        }
        
        // Now replace old password with new
        $return = Database::query("UPDATE `history_maps`. `users` SET hash = ? WHERE email_address = ?", password_hash($_POST["reset"], 
        PASSWORD_DEFAULT), $_SESSION["email"]); 
        
        if($return == false)
        {
            apologize("Password could not be changed.", "/"); 
        }
        
        render("congrat.php", ["title" => "password changed", "message" => "Your password has been changed!", "link" => "index.php"]);
        
    }
        
?>