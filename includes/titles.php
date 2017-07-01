<?php     
    
    if ($title == "Mondego Bay")
    {
        $dir = "Mondego";
    }
    
    else if ($title == "Rolica")
    {
        $dir = "Rolica";
        $title = "The Battle of Rolica";
    }
    
    else if ($title == "Fuentes de Onoro")
    {
        $dir = "Fuentes";
        $title = "The Battle of Fuentes de Onoro";
    }
    
    else if ($title == "Ciudad Rodrigo")
    {
        $dir = "Ciudad";
        $title = "The Siege of Ciudad Rodrigo";
    }
    
    else if ($title == "Badajoz")
    {
        $dir = "Badajoz";
        $title = "The Siege of Badajoz";
    }
    
    else
    {
        $dir = $title;
        $title = "The Battle of " . $title;  
    }
    
?>