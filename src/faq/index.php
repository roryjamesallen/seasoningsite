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
	renderSEO('Frequently Asked Questions', 'https://seasoning.live/faq', 'Find an answer to all of your most pressing Seasoning questions.');
	?>
	<link rel="stylesheet" href="style.css?v=<?php echo file_get_contents($root.'css-version.txt'); ?>">
    </head>
    <?php echo $analytics ?>
    <body>
	<?php renderTitle('Frequently Asked Questions'); ?>
        <div class="secondary-background">
	    <?php
     renderPageBreak(1, 'primary');
	    ?>
	</div>
        <div class="full-width secondary-background">
        <div class="faq-container paragraph">
	    <h3>Question?</h3>
	    <p>Please email bookings@seasoning.live for enquiries relating to booking an artist.</p>
	    <h3>Question?</h3>
	    <p>Or email production@seasoning.live for anything relating to other Seasoning goings on!</p>
     </div>
	</div>
            <?php renderPageBreak(2, 'secondary'); ?>
    </body>

    <?php renderFooter(); ?>
</html>

<script type="module" src="scripts.js"></script>
