<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$root = '../';
include '../lib.php';

if (isset($_GET['a'])){
    $artist = urldecode($_GET['a']);
} else {
    header('Location: ../');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
	<base href="../">
	<?php renderSEO('Seasoning Artist - '.$artist); ?>
	<link rel="stylesheet" href="style.css?v=33">
    </head>
    <?php echo $analytics ?>
    
    <body>
	<?php renderTitle('Artist Spotlight: '.$artist); ?>
	<?php renderArtistInfo($artist); ?>
	<?php renderEventsForArtist($artist); ?>
    </body>

    <?php renderFooter() ?>
</html>
