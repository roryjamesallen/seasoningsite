<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'lib.php';
?>
<html>
    <head>
	<link rel="stylesheet" href="style.css?v=13">
    </head>
    <body>
	<div id="grain-overlay"></div>
	<div id="gl5-backdrop"><div></div></div>
	<h1 class="goo moving-children"><span>S</span><span>e</span><span>a</span><span>s</span><span>o</span><span>n</span><span>i</span><span>n</span><span>g</span></h1>
	<h2 class="moving-children" movementpx="4"><?php echo $tagline; ?></h2>

	<div class="paragraph" style="margin-top: 1rem;">
	    Building durable scenes in a thriving dance music ecosystem, inspired by the spirit of rave.
	</div>
	
	<h3 style="margin-top: 1rem;">All Shows</h3>
	<div class="paragraph" style="margin-top: 1rem">
	    <?php echo renderEventList(); ?>
	</div>

	<div class="paragraph" style="margin-top: 1rem">
	    <iframe src="https://ra.co/promoters/119677/widget/events?theme=light" height="100%" width="100%" style="border: none;"></iframe>
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

 window.onload = (event) => {
     moveTitleLetters();
     setInterval(moveTitleLetters, 2000);
 };
</script>
