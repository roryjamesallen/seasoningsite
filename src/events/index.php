<?php
$root = '../';
include '../../lib.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
	<base href="../">
	<?php
	renderSEO('Events', 'https://seasoning.live/events', 'The past and future of Seasoning.');
	?>
	<link rel="stylesheet" href="style.css?v=<?php echo file_get_contents($root.'css-version.txt'); ?>">
    </head>
    <?php echo $analytics ?>
    <body>
	<?php renderTitle(''); ?>
	<div class="secondary-background" style="position: relative; z-index: -1">
	    <?php
	     renderPageBreak(1, 'primary');
	    renderUpcomingAndPastEvents(false,'. Watch this space...');
	    ?>
	</div>
	<?php renderPageBreak(2, 'secondary'); ?>
    </body>

    <?php renderFooter(); ?>
</html>

<script type="module" src="scripts.js"></script>