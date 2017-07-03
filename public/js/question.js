 $(function(){
    
    var inner = document.getElementById("inner");
    var outer = document.getElementById("outer");
    
    // Get array of children elements within this tag
    var child = outer.children;
   
    for (var i in scenarios)
    {
        if (title == scenarios[i].title)
        {
            child[0].innerHTML = scenarios[i].date;
            child[1].innerHTML = scenarios[i].background; 
        }
    }
    
    // Default view
    outer.style.visibility = "hidden"; 
    
    // First page from map - show background to scenario
    if (answered == 0)
    {
        inner.style.visibility = "hidden";
        outer.style.visibility = "visible"; 
    }
    
    // If user clicks link to proceed to quiz, then show
    $('a').click( function() {
        
        outer.style.visibility = "hidden";
        inner.style.visibility = "visible";
        return false;
    })
   
    // Array of input ids
    var input = ["input1", "input2", "input3"];
   
    // Generate random index between 1 and 3 then deduct 1 to zero index
    var random = (Math.floor((Math.random() * 3) + 1)) - 1;
   
    // Choose random id from input array
    input = input[random]; 
   
    // Randomly set radio button to checked
    document.getElementById(input).checked = true;
   
});