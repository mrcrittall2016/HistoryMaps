function click_me(n,o){for(var e=0,r=0;r<n.length;r++)n[r].style.cursor="pointer",n[r].onmouseout=function(){console.log(intros.Standard),$(".supporting-1 dialogue").html("<h2>"+intros.Standard+"</h2>")},n[r].onmouseover=function(){"wellington"==o?$(".supporting-1 .dialogue").html("<h2>"+intros.Wellington+"</h2>"):"alexander"==o?$(".supporting-1 .dialogue").html("<h2>"+intros.Alexander+"</h2>"):"war"==o&&$(".supporting-1 .dialogue").html("<h2>"+intros.WW2+"</h2>")},n[r].onclick=function(){if("wellington"==o){var n="introduction.php";window.location.href=n}else{var n="construction.php";window.location.href=n}}}var general=[];$(function(){general=["alexander","wellington","war"];for(var n in general){var o=$("."+general[n]);click_me(o,general[n])}});