<!DOCTYPE html>

<!-- Rendered from index.php if $_SESSION["id"] is filled -->

<html class="quiz">

    <head>

        <!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>

        <link href="/css/styles.css" rel="stylesheet"/>
        
        <title>History Maps</title>

        <!-- https://jquery.com/ -->
        <script src="/js/jquery-1.11.3.min.js"></script>

        <!-- http://getbootstrap.com/ -->
        <script src="/js/bootstrap.min.js"></script>
        
        <!--javascript object for changing bottom window content -->
        <script src="/js/intros.js"></script>
        
        <!--When click on header or portraits, directs to relevant map page. In addition, changes message in bottom window
        depending on image or title mouse hovers over-->
        <script src = "/js/campaign.js"></script>

    </head>
    
    <body id = "titlepage">
        
        <div id ="titleframe">                               
            <img id ="titlepaper" src="img/pages/paper.jpg">
            <font id="maintitle">Campaign Selector</font>
        </div>
        
        <div id="wrapper2">
            <div id ="camframe" class = "Alexander">                                
                <img id ="titlepaper" style="width:360px; height:45px;", src="img/pages/paper.jpg">
                <font id="titlehead" style ="left:-150px; top:10px; font-size:30px;">Alexander the Great</font>
            </div>
            
            <div id ="camframe" style="margin:-60px auto;" class = "Wellington"> style="left:650px; top:80px;">                               
                <img id ="titlepaper" style="width:360px; height:45px;", src="img/pages/paper.jpg">
                <font id="titlehead" style ="left:-150px; top:10px; font-size:30px;">Road to Waterloo</font>
            </div>
            
            <div id ="camframe" style="margin:-50px auto 0 1000px;" class = "WW2"> style="left:150px; top:20px;">                               
                <img id ="titlepaper" style="width:360px; height:45px;", src="img/pages/paper.jpg">
                <font id="titlehead" style ="left:-150px; top:10px; font-size:30px;">World War II</font>
            </div>
        </div>
        
        <div id = "wrapper">
            <div id="boxContainer" class = "Alexander" style="margin:10px;">
                <img id="box", src = "img/pages/elephant.gif">
            </div>
            
            <div id="boxContainer" class = "Wellington" style="margin:10px; left: 500px; bottom:432px;">
                <img id="box", src = "img/pages/wellington.jpg">
            </div>
            
            <div id="boxContainer" class = "WW2" style="margin:10px; left: 1000px; bottom:863px">
                <img id="box", src = "img/pages/ww2.png">
            </div>
        </div>
        
        <div id ="mainframe" style="margin-top:40px; margin-bottom:40px;"> 
            <img id = "mainpaper" src = "img/pages/paper.jpg">
            <font id="title" style ="width:600px; left:100px">Choose your campaign! Which journey through history will you embark on?</font>
            <a href = "logout.php" id="href" style="top:130px;"value="correct"><font id="options">Or click here to logout</font></a>
        </div>
        
    </body>
</html>