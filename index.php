<?php
     
    // If logged in then this controller renders the campaign ie main menu view
    
    // configuration
    require("includes/config.php"); 
    
    // render campaign page if logged in 
    render("campaign_selector.php", ["title" => "Campaign chooser"]); 
    
?>