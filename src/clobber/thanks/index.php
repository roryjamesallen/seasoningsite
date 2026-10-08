<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$root = '../../';
include '../../../lib.php';

startMailingListForm($_POST);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
	<base href="../../">
	<?php
	renderSEO('Thanks for your order', 'https://seasoning.live/clobber/thanks', 'Thanks for your order');
	?>
	<link rel="stylesheet" href="style.css?v=<?php echo file_get_contents($root.'css-version.txt'); ?>">
     <meta name="robots" content="noindex">
    </head>
    <?php echo $analytics ?>
    <body>
	<?php renderTitle('<span style="display: block; text-align: center">Thanks for your order</span>'); ?>
        <br><br>
	<div class="paragraph">

<?php
     renderMailingListForm($_GET);
?>

	</div>
	</div>
	<div style="height: 5rem;"></div>
    </body>

    <?php renderFooter(); ?>
</html>

<script type="module" src="scripts.js"></script>
