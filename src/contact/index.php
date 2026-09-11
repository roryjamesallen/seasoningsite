<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$root = '../';
include '../../lib.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
	<base href="../">
	<?php
	renderSEO('Contact the Seasoning Crew', 'https://seasoning.live/contact', 'Email us for bookings or other enquiries.');
	?>
	<link rel="stylesheet" href="style.css?v=<?php echo file_get_contents($root.'css-version.txt'); ?>">
    </head>
    <?php echo $analytics ?>
    <body>
	<?php renderTitle('Contact Us!'); ?>
	<h3>Bookings</h3>
	<p class="paragraph">Please email bookings@seasoning.live for enquiries relating to booking an artist.</p>
	<h3>Production</h3>
	<p class="paragraph">Or email production@seasoning.live for anything relating to other Seasoning goings on!</p>
    </body>

    <?php renderFooter(); ?>
</html>

<script type="module" src="scripts.js"></script>
