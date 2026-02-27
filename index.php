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
	    <span h-offset="-0.75">n</span>
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
     const max_letter_offset_rem = 0.5; // +- in both directions
     for (let i=0; i<element.children.length; ++i){
	 let horizontal_offset_rem = Math.floor(Math.random()*2) * max_letter_offset_rem;
	 const vertical_offset_rem =  Math.floor(Math.random()*2) * max_letter_offset_rem;
	 element.children[i].style.transform = 'translate('+horizontal_offset_rem+'rem, '+vertical_offset_rem+'rem)';
     }
 }

 // Initialisers
 function initialiseTitleLetters(){
     const letter_width_rem = 4.5;
     const centre_offset_rem = (title_letters.children.length * -letter_width_rem) / 2;
     for (let i=0; i<title_letters.children.length; ++i){
	 let horizontal_offset_rem = centre_offset_rem + (i * letter_width_rem);
	 if (title_letters.children[i].hasAttribute('h-offset')){
	     horizontal_offset_rem = horizontal_offset_rem + parseFloat(title_letters.children[i].getAttribute('h-offset'));
	 }
	 title_letters.children[i].style.left = horizontal_offset_rem+'rem';
     }
 }
 function initialiseMovingLetters(){
     initialiseTitleLetters();
     
     title_letters.style.transition = 'transform 1s ease-out, opacity 1s ease-out';
     title_letters.style.opacity = '1';
     //updateMovingLetters(title_letters);
     setTimeout(function(){ title_letters.style.transition = 'transform 10s ease-in'; }, 1000);
     title_letters.style.fontSize = title_size_rem + 'rem';
     setInterval(function(){ updateMovingLetters(title_letters); }, 1500);
 }

 window.onload = (event) => {
     initialiseMovingLetters();
 };
</script>
