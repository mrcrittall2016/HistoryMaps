// When page is ready...

$(function(){
    
    //var inner = document.getElementById("inner");
    //var outer = document.getElementById("outer");
    
    // Get array of children elements within this tag
    //var child = inner.children;
    
    for (var i in scenarios)
    {
        if (title == scenarios[i].title)
        {
            //child[0].innerHTML = scenarios[i].title + ", " + scenarios[i].date;
            $('#inner h2').html(scenarios[i].title + ", " + scenarios[i].date); 
            //child[1].innerHTML = scenarios[i].aftermath; 
            $('#inner p').html(scenarios[i].aftermath);
        }
    }
    
    // Default view
    //inner.style.visibility = "hidden"; 
    $('#inner').css("display", "none"); 
    
    // If user clicks link to proceed to quiz, then show
    $('#outer a').click(function() {
        
        event.preventDefault(); 
        //outer.style.visibility = "hidden";
        $('#outer').css("display", "none"); 
        //inner.style.visibility = "visible";
        $('#inner').css("display", "block"); 
        //return false;
    })

})