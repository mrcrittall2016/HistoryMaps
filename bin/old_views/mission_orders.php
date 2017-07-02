<!DOCTYPE html>

<html class="quiz">

    <head>

        <!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>

        <link href="/css/styles.css" rel="stylesheet"/>
        
        <title>Orders</title>

        <!-- https://jquery.com/ -->
        <script src="/js/jquery-1.11.3.min.js"></script>

        <!-- http://getbootstrap.com/ -->
        <script src="/js/bootstrap.min.js"></script>
        
        <!--script file containing an object of the mission orders as well as Javascript to insert letter and content -->
        <script src = "/js/orders.js"></script>
        
    </head>
    
    <body class = "question">
        
        <div id ="titleframe" style="margin-top:20px;">                               
            <img id ="titlepaper" src="img/pages/paper.jpg">
            <font id="titlehead" style="left:50px;"><?php echo $title ?></font>
        </div>
        
        <div id = "orders">
            <a href = "add.php" id="href"><font id="options" style = "top:-275px; left:130px; width:500px;">Add content to battle scenarios (administrator only)</font></a>
            <font id = address>address</font>
            <font id = head>title</font>
            <font id = content>letter</font>
            <font id = signed>signed</font>
            <font id = from>name</font>
            <a href = "scenario.php" id="href"><font id="options" style="top:230px; left:150px;">Click to set sail for Portugal and Mondego Bay!</font></a>
            
        </div>
        
    </body>
</html>