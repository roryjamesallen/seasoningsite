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
	<link rel="stylesheet" href="style.css?v=14">
    </head>
    <body>
	<div id="gl5-backdrop"></div>
	<a href=""><h1 class="goo moving-children"><span>S</span><span>e</span><span>a</span><span>s</span><span>o</span><span>n</span><span>i</span><span>n</span><span>g</span></h1></a>
	<h2 class="moving-children" movementpx="4">Artist Highlight: <?php echo $artist; ?></h2>
	<h3 style="margin-top: 1rem;">Shows</h3>
	<div class="paragraph" style="margin-top: 1rem">
	    <?php echo renderEventsForArtist($artist); ?>
	</div>
    </body>
</html>
