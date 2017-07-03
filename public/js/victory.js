// When page is ready...

$(function(){
    
    var inner = document.getElementById("inner");
    var outer = document.getElementById("outer");
    
    // Get array of children elements within this tag
    var child = inner.children;
    
    for (var i in scenarios)
    {
        if (title == scenarios[i].title)
        {
            child[0].innerHTML = scenarios[i].title + ", " + scenarios[i].date;
            child[1].innerHTML = scenarios[i].aftermath; 
        }
    }
    
    // Default view
    inner.style.visibility = "hidden"; 
    
    // If user clicks link to proceed to quiz, then show
    $('#href').click( function() {
        
        outer.style.visibility = "hidden";
        inner.style.visibility = "visible";
        return false;
    })

})