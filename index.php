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

	<?php
	renderUpcomingAndPastEvents()
	?>
	
    </body>

    <?php renderFooter() ?>
</html>

<script type="module" src="scripts.js"></script>
