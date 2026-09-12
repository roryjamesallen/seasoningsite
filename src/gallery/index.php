 <?php
$root = '../';
include '../../lib.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
	<base href="../">
	<?php
	renderSEO('Seasoning Gallery', 'https://seasoning.live/gallery', 'See with your own eyes what Seasoning is all about.');
	?>
	<link rel="stylesheet" href="style.css?v=<?php echo file_get_contents($root.'css-version.txt'); ?>">
    </head>
    <?php echo $analytics ?>
    <body>							
	<?php renderTitle('Gallery'); ?>
	
	    <div class="gallery-container paragraph">
		<h3>Goods Yard</h3>
		<div class="gallery-gradient"></div>
		<div class="gallery">
		    <?php
		    renderPhoto('seasoning-festival-photo-1.jpg', 'Fabric sails at Seasoning Festival 2026, Stroud', 'Samuel Wilson');
		    renderPhoto('seasoning-festival-photo-2.jpg', 'Attendees outside The SVA, Stroud at Seasoning Festival 2026', 'Samuel Wilson');
		    renderPhoto('seasoning-festival-photo-4.jpg', 'Attendees outside The SVA, Stroud at Seasoning Festival 2026', 'Samuel Wilson');
		    ?>
		</div>
	    </div>
	    <br>
	    <div class="secondary-background">
	    <?php
	    renderPageBreak(1, 'primary');
	    ?>
		<br>
	    <div class="paragraph" id="gallery">
		<div class="gallery-container">
		    <h3 style="color: var(--beige)">Goods Shed</h3>
		    <div class="gallery-gradient"></div>
		    <div class="gallery">
			<img src="images/gallery/seasoning-festival-photo-1.jpg" loading="lazy" alt="Fabric sails at Seasoning Festival 2026, Stroud" draggable="false">
			<img src="images/gallery/seasoning-festival-photo-2.jpg" loading="lazy" alt="Attendees outside The SVA, Stroud at Seasoning Festival 2026" draggable="false">
			<img src="images/gallery/seasoning-festival-photo-4.jpg" loading="lazy" alt="Person wearing Seasoning Festival 2026 T-Shirt" draggable="false">
			<img src="images/gallery/seasoning-festival-photo-5.jpg" loading="lazy" alt="Pizzas being served at Seasoning Festival 2026, Stroud" draggable="false">
			<img src="images/gallery/seasoning-festival-photo-6.jpg" loading="lazy" alt="Wall art being drawn at Seasoning Festival 2026, Stroud" draggable="false">
			<img src="images/gallery/seasoning-festival-photo-7.jpg" loading="lazy" alt="Printing press beig used at Seasoning Festival 2026, Stroud" draggable="false">
 			<img src="images/gallery/seasoning-festival-photo-8.jpg" loading="lazy" alt="Hand painted blue and pink moon for Seasoning Festival 2026, Stroud" draggable="false">
			<img src="images/gallery/seasoning-festival-photo-9.jpg" loading="lazy" alt="Hay bales and fabric flags at Seasoning Festival 2026, Stroud" draggable="false">
			<img src="images/gallery/seasoning-festival-photo-10.jpg" loading="lazy" alt="A person in the stocks at Seasoning Festival 2026, Stroud" draggable="false">
			<img src="images/gallery/seasoning-festival-photo-11.jpg" loading="lazy" alt="The Goods Yard outside bar at Seasoning Festival 2026, Stroud" draggable="false">
			<img src="images/gallery/seasoning-festival-photo-3.jpg" loading="lazy" alt="Attendees at at Seasoning Festival 2026, Stroud" draggable="false">
		    </div>
		</div>
	    </div>	
	</div>
	<?php renderPageBreak(2, 'secondary'); ?>
    </body>

    <?php renderFooter(); ?>
</html>

<script type="module" src="scripts.js"></script>
