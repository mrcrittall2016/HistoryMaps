<?php

    // configuration
    require("includes/config.php"); 
    
    //$username = "Matthew";
    
    // Test query
    //$test = Database::query("SELECT* FROM `history_maps`.`scores` WHERE username = ?", $username);
    
    //print_r ($test); 
    
    render("index.html", ["title" =>"History Maps"]); 
    
?>