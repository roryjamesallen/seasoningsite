<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$root = '../';
include '../lib.php';

?>
<html>
    <head>
	<base href="../">
	<?php echo $seo; ?>
	<link rel="stylesheet" href="style.css?v=31">
    </head>
    <?php echo $analytics ?>
    
    <body>
	<?php echo renderTitle('The Roster'); ?>
	<?php echo renderArtistList(); ?>
    </body>

    <?php renderFooter() ?>
</html>
