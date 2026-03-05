<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$root = '../';
include '../lib.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
	<base href="../">
	<?php renderSEO('Seasoning - The Roster'); ?>
	<link rel="stylesheet" href="style.css?v=36">
    </head>
    <?php echo $analytics ?>
    
    <body>
	<?php renderTitle('The Roster'); ?>
	<?php renderArtistList(); ?>
    </body>

    <?php renderFooter() ?>
</html>
