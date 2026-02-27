<html>
    <head>
	<link rel="stylesheet" href="style.css?v=11">
    </head>
    <body>
	<h1 class="goo moving-children"><span>S</span><span>e</span><span>a</span><span>s</span><span>o</span><span>n</span><span>i</span><span>n</span><span>g</span></h1>
	<div id="toolbar" class="moving-children">
	    <a id="insta-link" href="https://www.instagram.com/seas0ning_/"><img src="images/icons/instagram.png"></a>
	    <a id="ra-link" href="https://ra.co/promoters/119677"><img src="images/icons/resident-advisor.png"></a>
	</div>
    </body>
</html>
<script>
 const movement_px = 10;

 function moveTitleLetters(){
     for (let j=0; j<document.getElementsByClassName('moving-children').length; ++j){
	 const parent = document.getElementsByClassName('moving-children')[j];
	 for (let i=0; i<parent.children.length; ++i){
	     const x_px = Math.floor((((Math.random() * 2) - 1) * movement_px));
	     const y_px = Math.floor((((Math.random() * 2) - 1) * movement_px));
	     parent.children[i].style.transform = 'translate3d('+x_px+'px, '+y_px+ 'px, 0)';
	 }
     }
 }

 window.onload = (event) => {
     moveTitleLetters();
     setInterval(moveTitleLetters, 2000);
 };
</script>
