<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'lib.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
	<?php renderSEO(); ?>
	<link rel="stylesheet" href="style.css?v=<?php echo file_get_contents($root.'css-version.txt'); ?>">
    </head>
    <?php echo $analytics ?>
    
    <body>

	<?php renderTitle('Live events in the South West and beyond'); ?>

	<h3 class="collapser" collapse="gallery">Gallery</h3>
	<div class="paragraph" id="gallery" style="margin: 1rem auto 2rem">
	    <p style="flex-basis: 100%; margin: 0 auto">Relive <a href="/festival">Seasoning Festival 2026</a> through these gorgeous photos taken by <a href="https://www.instagram.com/samuelwilsonphotography/">Samuel Wilson</a>.
	    </p>
	    <div class="gallery-container">
		<div class="gallery-gradient"></div>
		<div class="gallery">
		    <img src="images/gallery/seasoning-festival-photo-1.jpg" alt="Fabric sails at Seasoning Festival 2026, Stroud" draggable="false">
		    <img src="images/gallery/seasoning-festival-photo-2.jpg" alt="Attendees outside The SVA, Stroud at Seasoning Festival 2026" draggable="false">
		    <img src="images/gallery/seasoning-festival-photo-4.jpg" alt="Person wearing Seasoning Festival 2026 T-Shirt" draggable="false">
		    <img src="images/gallery/seasoning-festival-photo-5.jpg" alt="Pizzas being served at Seasoning Festival 2026, Stroud" draggable="false">
		    <img src="images/gallery/seasoning-festival-photo-6.jpg" alt="Wall art being drawn at Seasoning Festival 2026, Stroud" draggable="false">
		    <img src="images/gallery/seasoning-festival-photo-7.jpg" alt="Printing press beig used at Seasoning Festival 2026, Stroud" draggable="false">
 		    <img src="images/gallery/seasoning-festival-photo-8.jpg" alt="Hand painted blue and pink moon for Seasoning Festival 2026, Stroud" draggable="false">
		    <img src="images/gallery/seasoning-festival-photo-9.jpg" alt="Hay bales and fabric flags at Seasoning Festival 2026, Stroud" draggable="false">
		    <img src="images/gallery/seasoning-festival-photo-10.jpg" alt="A person in the stocks at Seasoning Festival 2026, Stroud" draggable="false">
		    <img src="images/gallery/seasoning-festival-photo-11.jpg" alt="The Goods Yard outside bar at Seasoning Festival 2026, Stroud" draggable="false">
		    <img src="images/gallery/seasoning-festival-photo-3.jpg" alt="Attendees at at Seasoning Festival 2026, Stroud" draggable="false">
		</div>
	    </div>
	</div>
	<hr>

	<h3 class="collapser collapser-collapsed" collapse="mixes">Mixes</h3>
	<div class="paragraph collapsed" id="mixes" style="margin: 1rem auto 2rem">
	    <iframe width="50%" height="400" src="https://player-widget.mixcloud.com/widget/iframe/?feed=%2Fworldwidefm%2Flove-cuts-lovellious-w-fraser-dahdouh-seasoning-special-08-05-26%2F" frameborder="0" allow="encrypted-media; fullscreen; autoplay; idle-detection; speaker-selection; web-share;" ></iframe>
	</div>
	<hr>

	<?php
	renderUpcomingAndPastEvents()
	?>
	
    </body>

    <?php renderFooter() ?>
</html>

<script type="module" src="scripts.js"></script>
