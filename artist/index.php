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
	<?php renderSEO($artist.' - Seasoning Artist Spotlight', 'https://seasoning.live/artist?a='.urlencode($artist)); ?>
	<link rel="stylesheet" href="style.css?v=<?php echo file_get_contents($root.'css-version.txt'); ?>">
    </head>
    <?php echo $analytics ?>
    
    <body>
	<?php
	renderTitle('Artist Spotlight: '.$artist);
	renderArtistInfo($artist);
renderUpcomingAndPastEvents($artist, ' featuring '.$artist);
	?>
    </body>

    <?php renderFooter() ?>
</html>

<script type="module" src="scripts.js"></script>
