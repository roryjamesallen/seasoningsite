<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
//$_SESSION['popup'] = true;
if (isset($_POST['signup'])){
    // record email
    $popup = false;
    $_SESSION['popup'] = false;
    header('Location: ?msg=Signed+up!');
} else if (isset($_POST['close'])){
    $popup = false;
    $_SESSION['popup'] = false;
    header('Location: ?msg=Popup+closed');
} else if (isset($_SESSION['popup']) && $_SESSION['popup'] == false){
    $popup = false;
} else {
    $popup = true;
}

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
	<div id="popup">
	    <form method="POST">
		<h2 class="star-container" stars="5" star-size="5">Keep in touch!</h2>
		<input type="email" name="email" placeholder="you@example.com">
		<input type="submit" value="Sign Up" name="signup">
		<input type="submit" id="close-popup" name="close" value="✖">
	    </form>
	    
	</div>

	
	<?php renderTitle('Rave Culture is Folk Culture'); ?>

	<?php
	renderUpcomingAndPastEvents(false,'. Watch this space...');
	?>
	<hr>

	<!--
	<h2 class="collapser collapser-collapsed" collapse="faqs">FAQs</h2>
	<div class="paragraph collapsed" id="faqs" style="margin: 1rem auto 2rem">
	    <hr>
	    <h3>What is this?</h3>
	    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
	    <hr>
	    <h3>What is this?</h3>
	    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
	</div>
	<hr>
	-->
	
	<h2 class="collapser collapser-collapsed" collapse="gallery">Gallery</h2>
	<div class="paragraph collapsed" id="gallery" style="margin: 1rem auto 2rem">
	    <p style="flex-basis: 100%; margin: 0 auto">Relive <a href="festival">Seasoning Festival 2026</a> through the lens of on-site photographer <a href="https://www.instagram.com/samuelwilsonphotography/">Samuel Wilson</a>.
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

	<h2 class="collapser collapser-collapsed" collapse="mixes">Mixes</h2>
	<div class="paragraph collapsed" id="mixes" style="margin: 1rem auto 2rem">
	    <p>Listen back to the <a href="https://www.instagram.com/l0ve.cuts/">Love Cuts</a> 'Seasoning Special' <a href="https://www.worldwidefm.net/">Worldwide FM</a> broadcast: Fraser and <a href="artist/Lovellious">Lovellious</a> discuss the meaning behind the 'Rave Culture is Folk Culture' slogan ahead of <a href="festival">Seasoning Festival 2026</a> , interspersed with mystic folky funky music.</p>
	    <iframe width="50%" height="400" src="https://player-widget.mixcloud.com/widget/iframe/?feed=%2Fworldwidefm%2Flove-cuts-lovellious-w-fraser-dahdouh-seasoning-special-08-05-26%2F" frameborder="0" allow="encrypted-media; fullscreen; autoplay; idle-detection; speaker-selection; web-share;" ></iframe>
	</div>
    </body>
    
    <?php renderFooter() ?>
</html>

<script>let popup = <?php echo json_encode($popup); ?></script>
<script type="module" src="scripts.js"></script>
