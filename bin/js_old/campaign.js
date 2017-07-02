// Global variables
var general = []; 


// When document is ready. Note that $(function(){ is short hand for $(document).ready(function(){
$(document).ready(function(){
    
    // For demo purposes, this changes cursor over title using jQuery
    //$('#titleframe').css('cursor','pointer');
   
    general = ["Alexander", "Wellington", "WW2"]; 
    // getElementById() should only ever return one element. ClassName returns an array of elements
    
    for (var i = 0; i < general.length; i++)
    {
        console.log(general[i]);
        var array = document.getElementsByClassName(general[i]);
        console.log(array); 
        click(array, general[i]);
    }
    
}); 

// Call click function to assign onclick eventlisterner to relevant element(s)
function click (array, campaign)
{
    var length = 0; 
    
    for (var i = 0; i < array.length; i++){
        
        
        // Changes element in classes array to change mouse to pointer when hovers over
        array[i].style.cursor = "pointer";
        
        // Normal behaviour. Possibly delete this as does not give user time to click link in bottom window
        array[i].onmouseout = function(){
            
             document.getElementById("title").innerHTML = intros.Standard; 
            
        }
        
        
        // When hover over replace text in window below pictures with...
        array[i].onmouseover = function(){
            
            if (campaign == "Wellington")
            {
                document.getElementById("title").innerHTML = intros.Wellington; 
                
            }
            
            else if (campaign == "Alexander")
            {
                document.getElementById("title").innerHTML = intros.Alexander; 
                
            }
            
            else if (campaign == "WW2")
            {
                document.getElementById("title").innerHTML = intros.WW2; 
                
            }
            
        }   
        
        array[i].onclick = function(){
            
            
            if (campaign == "Wellington")
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