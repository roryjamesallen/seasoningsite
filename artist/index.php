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
<html>
    <head>
	<base href="../">
	<?php echo $seo; ?>
	<link rel="stylesheet" href="style.css?v=33">
    </head>
    <?php echo $analytics ?>
    
    <body>
	<?php echo renderTitle('Artist Spotlight: '.$artist); ?>
	<?php echo renderArtistInfo($artist); ?>
	<?php echo renderEventsForArtist($artist); ?>
    </body>

    <?php renderFooter() ?>
</html>
