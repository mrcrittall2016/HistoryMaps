<?php
     
    // If logged in then this controller renders the campaign ie main menu view
    
    // configuration
    require("../includes/config.php"); 
    
    // render campaign page if logged in 
    render("campaign.php", ["title" => "Campaign chooser"]); 
    
?>