<?php
    
    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        apologize("Coming Soon, still under construction!", "/"); 
    }
    
?>