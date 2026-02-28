<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'lib.php';
?>
<html>
    <head>
	<?php echo $seo; ?>
	<link rel="stylesheet" href="style.css?v=16">
    </head>
    <body>
	<div id="gl5-backdrop"><div></div></div>
	<h1 class="goo moving-children"><span>S</span><span>e</span><span>a</span><span>s</span><span>o</span><span>n</span><span>i</span><span>n</span><span>g</span></h1>
	<h2 class="moving-children" movementpx="4"><?php echo $tagline; ?></h2>

	<div class="paragraph" style="margin-top: 1rem;">
	    Building durable scenes in a thriving dance music ecosystem, inspired by the spirit of rave.
	</div><br>
	<hr>
	<div class="paragraph" style="margin-top: 1rem; height: fit-content">
	    <iframe id="ra-embed" src="https://ra.co/promoters/119677/widget/events?theme=dark&customBackgroundColor=%2332262E&customTextColor=" width="100%" style="border: none; mix-blend-mode: lighten; aspect-ratio: 2 / 1"></iframe>
	</div>
	
	<h3 style="margin-top: 1rem;" class="collapser" collapse="event-list">All Shows</h3>
	<div class="paragraph" style="margin-top: 1rem" id="event-list">
	    <?php echo renderEventList(); ?>
	</div><br>

	<h3 style="margin-top: 1rem;">Contact</h3>
	<div class="paragraph" style="margin-top: 1rem">
	    <a href="https://www.instagram.com/seas0ning_/?hl=en">Instagram</a> / <a href="https://www.facebook.com/Seas0ning/">Facebook</a> / <a href="https://ra.co/promoters/119677">Resident Advisor</a> / <a href="https://soundcloud.com/seas0ning">SoundCloud</a>
	</div>
	    
    </body>
</html>
<script>
 const movement_px = 10;

 function moveTitleLetters(){
     for (let j=0; j<document.getElementsByClassName('moving-children').length; ++j){
	 const parent = document.getElementsByClassName('moving-children')[j];
	 for (let i=0; i<parent.children.length; ++i){
	     if (Math.floor(Math.random()*5) == 0){
		 let element_movement_px = movement_px;
		 if (parent.hasAttribute('movementpx')){
		     element_movement_px = parseFloat(parent.getAttribute('movementpx'));
		 }
		 const x_px = Math.floor((((Math.random() * 2) - 1) * element_movement_px));
		 const y_px = Math.floor((((Math.random() * 2) - 1) * element_movement_px));
		 parent.children[i].style.transform = 'translate3d('+x_px+'px, '+y_px+ 'px, 0)';
	     }
	 }
     }
 }

 function toggleCollapse(event){
     console.log('eh');
     const collapser = event.target;
     const collapsee = document.getElementById(collapser.getAttribute('collapse'));
     if ([...collapsee.classList].includes('collapsed')){
	 collapsee.classList.remove('collapsed')
	 collapser.classList.remove('collapser-collapsed');
     } else {
	 collapsee.classList.add('collapsed');
	 collapser.classList.add('collapser-collapsed');
     }
 }

 function initialiseCollapsers(){
     const collapsers = document.getElementsByClassName('collapser');
     for (let i=0; i<collapsers.length; ++i){
	 console.log(collapsers[i]);
	 collapsers[i].addEventListener('click', toggleCollapse);
     }
 }

 window.onload = (event) => {
     moveTitleLetters();
     setInterval(moveTitleLetters, 2000);
     initialiseCollapsers();
 };
</script>
