// Global variables
var general = []; 


// When document is ready. Note that $(function(){ is short hand for $(document).ready(function(){
$(function(){
    
    // For demo purposes, this changes cursor over title using jQuery
    //$('#titleframe').css('cursor','pointer');
   
    general = ["alexander", "wellington", "war"]; 
    // getElementById() should only ever return one element. ClassName returns an array of elements
    
    for (var i in general)
    {
       
        //var array = document.getElementsByClassName(general[i]);
        //var tag = '.' + general[i]; 
        var array = $('.' + general[i]);      
       
       /* $('.' + general[i]).mouseout(function(){
            $('.supporting-1 dialogue').html('<h2>' + intros.Standard + '</h2>');
        });*/

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
             console.log(intros.Standard); 
             $('.supporting-1 dialogue').html('<h2>' + intros.Standard + '</h2>');             
            
        }
        


        
        // When hover over replace text in window below pictures with...
        array[i].onmouseover = function(){
            
            if (campaign == "wellington")
            {
                //document.getElementById("title").innerHTML = intros.Wellington;             
                // Add in own text
                $('.supporting-1 .dialogue').html('<h2>' + intros.Wellington + '</h2>');  
                
            }
            
            else if (campaign == "alexander")
            {
                //document.getElementById("title").innerHTML = intros.Alexander;                 
                // Add in own text
                $('.supporting-1 .dialogue').html('<h2>' + intros.Alexander + '</h2>'); 
                
            }
            
            else if (campaign == "war")
            {
                //document.getElementById("title").innerHTML = intros.WW2; 
                // Add in own text
                $('.supporting-1 .dialogue').html('<h2>' + intros.WW2 + '</h2>'); 
                
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

