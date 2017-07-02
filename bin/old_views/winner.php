<!DOCTYPE html>

<html class="quiz">

    <head>

        <!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>

        <link href="/css/styles.css" rel="stylesheet"/>
        
        <title>battle window</title>

        <!-- https://jquery.com/ -->
        <script src="/js/jquery-1.11.3.min.js"></script>

        <!-- http://getbootstrap.com/ -->
        <script src="/js/bootstrap.min.js"></script>
        
         <!-- Javascript to enable href to be submitted as POST rather than GET -->
        <script src = "/js/post.js"></script>
        
        <!--script to control whether see final scores or not ie if at Vimerio (index 11) or Waterloo (index 12) -->
        <script>
            
            // When DOM is ready...
            $(function(){
                
                var British = '<?php echo $British ?>';
                var French = '<?php echo $French ?>'; 
                var link_get = document.getElementById("href");
                var link_post = document.getElementById("questions");
                
                if (British && French != "undefined"){
                    
                   $("#questions").hide();
                   var children = link_get.childNodes[0];  
                   children.innerHTML = "Click to continue..."; 
                    
                }
                
                else {
                    
                    $("#questions").show();
                    $("#href").hide(); 
                    $("#scores").hide(); 
                    
                }
            })
            
        </script>
        
        
    </head>
    
    <body class = "question">
        <div id ="titleframe">                               
            <img id ="titlepaper" src="img/pages/paper.jpg">
            <font id="titlehead" style="left:50px;"><?php echo $title ?></font>
        </div>
        
        <div class="battle">
            <img id="flag" src="<?php echo $image ?>">
        </div>
        
        <div id ="frame">
            <img id = "paper" src = "img/pages/paper.jpg">
            <font id="title" style ="word-wrap:initial; width:600px; left:100px;"><?php echo $message ?></font>
            <div id = "scores">
                <?php if(isset($British) && isset($French)): ?>
                   
                        <font id="title" style="top:165px; left:150px; font-size:21px; border-syle:solid; border-color:black;">
                            British Victories: <?php echo $British ?></br>
                            French Victories: <?php echo $French ?>
                        </font>
                   
                <?php endif ?>
            </div>
            <!-- if id of href is questions, then sends back to result.php as POST request -->
            <!--<a href = "result.php" id="questions"><font id="options" style="left:20px;">Click here to play again!</font></a>-->
            <form action = "result.php" method = "post"><input type = "submit"></form>
            <a href = "scenario.php" id = "href"><font id="options" style="top: -70px;left:50px;">Message</font></a>
        </div>
    </body>
</html>
