 <?php
$root = '../';
include '../../lib.php';
startMailingListForm($_POST);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
	<base href="../">
	<?php
	renderSEO('Mailing List', 'https://seasoning.live/mailing-list', 'Sign up to the Seasoning mailing list to hear about merch drops, event pre-sales, and other exclusive news.');
	?>
	<link rel="stylesheet" href="style.css?v=<?php echo file_get_contents($root.'css-version.txt'); ?>">
    </head>
    <?php echo $analytics ?>
    <body>
	<?php renderTitle(''); ?>
	<div class="paragraph">
	    <?php renderMailingListForm($_GET); ?>
	    </div>
    </body>

    <?php renderFooter(); ?>
</html>

<script type="module" src="scripts.js"></script>
