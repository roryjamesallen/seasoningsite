<html>
    <head>
	<link rel="stylesheet" href="style.css?v=3">
    </head>
    <body>
	<h1 id="title-container" class="morph-container">
	    <span>S</span>
	    <span>e</span>
	    <span>a</span>
	    <span>s</span>
	    <span h-offset="-0.75">o</span>
	    <span>n</span>
	    <span h-offset="1">i</span>
	    <span h-offset="-0.75">n</span>
	    <span>g</span>
	</h1>
	<div id="toolbar">
	    <a id="insta-link" href="https://www.instagram.com/seas0ning_/"><img src="images/icons/instagram.png" width="50px"></a>
	    <a id="ra-link" href="https://ra.co/promoters/119677"><img src="images/icons/resident-advisor.png" width="100px"></a>
	</div>
    </body>
</html>
<script>
 // Element Constants
 const title_letters = document.getElementById('title-container');
 const insta_letters = document.getElementById('insta-link');
 const ra_letters = document.getElementById('ra-link'); 

 // Helpers
 function pxToRem(px){
     return px / parseFloat(getComputedStyle(document.documentElement).fontSize);
 }
 
 // Dynamic Elements
 function updateMovingLetters(element, max_letter_offset_rem){
     for (let i=0; i<element.children.length; ++i){
	 let horizontal_offset_rem = (Math.random()*2) * max_letter_offset_rem;
	 const vertical_offset_rem =  (Math.random()*2) * max_letter_offset_rem;
	 element.children[i].style.transform = 'translate('+horizontal_offset_rem+'rem, '+vertical_offset_rem+'rem) translate3d(0,0,0)';
     }
 }

 // Initialisers
 function initialiseMovingLetters(element, centred=false){
     letter_width_rem = pxToRem(parseFloat(getComputedStyle(element).fontSize)) / 2.75;
     for (let i=0; i<element.children.length; ++i){
	 let horizontal_offset_rem = i * letter_width_rem;
	 if (element.children[i].hasAttribute('h-offset')){
	     horizontal_offset_rem = horizontal_offset_rem + parseFloat(element.children[i].getAttribute('h-offset'));
	 }
	 if (centred){
	     horizontal_offset_rem += (element.children.length * -letter_width_rem) / 2;
	     element.children[i].style.left = 'calc(50vw + '+horizontal_offset_rem+'rem)';
	 } else {
	     element.children[i].style.left = horizontal_offset_rem+'rem';
	 }
     }
 }
 function initialiseSelectMovingLetters(elements){
     for (let i=0; i<elements.length; ++i){
	 const element = elements[i][0];
	 initialiseMovingLetters(element,elements[i][3]);
	 element.style.transition = 'transform 1s ease-out, opacity 1s ease-out';
	 element.style.opacity = '1';
	 updateMovingLetters(element, elements[i][1]);
	 if (elements[i][2] == true){ //animated
	     setTimeout(function(){ element.style.transition = 'transform 5s ease-in-out'; }, 1000);
	     setInterval(function(){ updateMovingLetters(element, elements[i][1]); }, 2500);
	 }
     }
 }

 window.onload = (event) => {
     initialiseSelectMovingLetters([[title_letters,0.5,true,true]]);
 };
</script>
