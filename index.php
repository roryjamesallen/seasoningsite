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
