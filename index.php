<html>
    <head>
	<link rel="stylesheet" href="style.css?v=10">
    </head>
    <body>
	<h1><span>S</span><span>e</span><span>a</span><span>s</span><span>o</span><span>n</span><span>i</span><span>n</span><span>g</span></h1>
	<div id="toolbar">
	    <a id="insta-link" href="https://www.instagram.com/seas0ning_/"><img src="images/icons/instagram.png"></a>
	    <a id="ra-link" href="https://ra.co/promoters/119677"><img src="images/icons/resident-advisor.png"></a>
	</div>
    </body>
</html>
<script>
 const h1 = document.getElementsByTagName('h1')[0];
 const h1_letter_offset_rem = 0.5;

 function moveTitleLetters(){
     for (let i=0; i<h1.children.length; ++i){
	 h1.children[i].style.transform = 'translate('+(((Math.random() * 2) - 1) * h1_letter_offset_rem) + 'rem, '+(((Math.random() * 2) - 1) * h1_letter_offset_rem) + 'rem)';
     }
 }

 window.onload = (event) => {
     moveTitleLetters();
     setInterval(moveTitleLetters, 2000);
 };
</script>
