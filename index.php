<html>
    <head>
	<link rel="stylesheet" href="style.css">
    </head>
    <body>
	<h1 id="title-container">
	    <span>S</span>
	    <span>e</span>
	    <span>a</span>
	    <span>s</span>
	    <span h-offset="-0.75">o</span>
	    <span>n</span>
	    <span h-offset="1">i</span>
	    <span h-offset="-0.5">n</span>
	    <span>g</span>
	</h1>
    </body>
</html>
<script>
 // Setup Constants
 const title_size_rem = 12;
 
 // Element Constants
 const title_letters = document.getElementById('title-container');

 // Dynamic Elements
 function updateMovingLetters(element){
     const letter_width_rem = 4.5;
     const max_letter_offset_rem = 0.2; // +- in both directions
     const centre_offset_rem = (element.children.length * -letter_width_rem) / 2;
     for (let i=0; i<element.children.length; ++i){
	 let horizontal_offset_rem =  (Math.floor(Math.random()*2) * max_letter_offset_rem) + centre_offset_rem;
	 if (element.children[i].hasAttribute('h-offset')){
	     horizontal_offset_rem = horizontal_offset_rem + parseFloat(element.children[i].getAttribute('h-offset'));
	 }
	 const vertical_offset_rem =  Math.floor(Math.random()*2) * max_letter_offset_rem;
	 element.children[i].style.left = (i * letter_width_rem) + horizontal_offset_rem + 'rem';
	 element.children[i].style.top = vertical_offset_rem + 'rem';
     }
 }

 // Initialisers
 function initialiseMovingLetters(){
     // Title Letters
     updateMovingLetters(title_letters);
     setTimeout(function(){ title_letters.style.transition = 'top 5s, left 5s'; }, 100);
     title_letters.style.fontSize = title_size_rem + 'rem';
     setInterval(function(){ updateMovingLetters(title_letters); }, 1000);
 }

 window.onload = (event) => {
     initialiseMovingLetters();
 };
</script>
