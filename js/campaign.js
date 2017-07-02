// Global variables
var general = []; 


// When document is ready. 
$(function(){
   
   
    // Fix height of supporting-1 container so background does not jump around... only for this page
    /*if ($('.header .dialogue h1').html() == "Campaign Selector"){
        $('.supporting-1 .dialogue').css("height", "180px"); 
    }*/
   
    general = ["alexander", "wellington", "war"]; 
    // getElementById() should only ever return one element. ClassName returns an array of elements
    
    for (var i in general)
    {
       
        //var array = document.getElementsByClassName(general[i]);
        //var tag = '.' + general[i]; 
        var array = $('.' + general[i]);
        click_me(array, general[i]);
    }
    
}); 

// Call click function to assign onclick eventlisterner to relevant element(s)
function click_me (array, campaign)
{
    var length = 0; 
    
    //console.log(campaign);

    for (var i = 0; i < array.length; i++){
        
        
        // Changes element in classes array to change mouse to pointer when hovers over
        array[i].style.cursor = "pointer";
        //console.log(array[i]); 


        // Normal behaviour. Possibly delete this as does not give user time to click link in bottom window
        array[i].onmouseout = function(){
            
             //document.getElementById("title").innerHTML = intros.Standard;
             //$('body.background').css("background-attachement", "fixed"); 
             $('.supporting-1 .dialogue h2').html(intros.Standard);             
            
        }
        
        // When hover over replace text in window below pictures with...
        array[i].onmouseover = function(){
            
            if (campaign == "wellington")
            {
                //document.getElementById("title").innerHTML = intros.Wellington;             
                // Add in own text
                
                $('.supporting-1 .dialogue h2').html(intros.Wellington);  
                
            }
            
            else if (campaign == "alexander")
            {
                //document.getElementById("title").innerHTML = intros.Alexander;                 
                // Add in own text
                
                $('.supporting-1 .dialogue h2').html(intros.Alexander); 
                
            }
            
            else if (campaign == "war")
            {
                //document.getElementById("title").innerHTML = intros.WW2; 
                // Add in own text
                
                $('.supporting-1 .dialogue h2').html(intros.WW2); 
                
            }
            
        }   
        
        array[i].onclick = function(){
            
            
            if (campaign == "wellington")
            {
                var URL = "introduction.php";
                window.location.href = URL; 
            }
            
            else
            {
                
                var URL = "construction.php";
                window.location.href = URL;
            }
            
        }
            
        
    }
}
