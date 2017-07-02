var orders = {
    
    "Header":"London, 1808",
    "title": "My Lord,",
    "Letter": "As you are well aware the war with France has raged long and hard and shows no sign of relenting. Despite our naval successes at Travalgar and subsequent domninance of the seas, Napoleon's armies still dominate the European theatre. Since Napoleon has invaded Spain and placed his despot brother Joseph on the throne, we have gained a foothold in Portugal in an effort to push back the marauding French armies. We require you to depart immediately for Mondego Bay to assist the right honoruable Sir Arthur Wellesley in his quest to dismiss the French from the Iberian peninsular... Your mission is simple, answer a series of questions correctly for each battle that you encounter with Napoleon's Marshals. If you prove victorious,  you may gain the chance to beat the French Emperor himself and end this dreadful affair.",
    "Signed":"Signed",
    "From":"Lord Castlereagh"
}

 //Javascript to insert letter head and content 

$(function(){
    
    var top = document.getElementById("address");
    top.innerHTML = orders.Header;
    top.style = "position:absolute; font-family:Garamond, Baskerville, serif; font-style:italic; font-weight: 600; font-size:20px; left:1000px; top:50px;"
    
    var head = document.getElementById("head");
    head.innerHTML = orders.title;
    head.style = "position:absolute; font-family:Garamond, Baskerville, serif; font-style:italic; font-weight: 600; font-size:25px; left:50px; top:150px;"
    
    var content = document.getElementById("content");
    content.innerHTML = orders.Letter; 
    content.style = "position:absolute; font-family:Garamond, Baskerville, serif; font-style:italic; font-weight: 600; font-size:25px; left:50px; top:225px; width:1100px;"
    
    var signed = document.getElementById("signed");
    signed.innerHTML = orders.Signed;
    signed.style = "position:absolute; font-family:Garamond, Baskerville, serif; font-style:italic; font-weight: 600; font-size:25px; left:50px; top:480px; width:1100px;"
    
    var from = document.getElementById("from");
    from.innerHTML = orders.From;
    from.style = "position:absolute; font-family:Garamond, Baskerville, serif; font-style:italic; font-weight: 600; font-size:25px; left:50px; top:525px; width:1100px;"
    
});
            
      