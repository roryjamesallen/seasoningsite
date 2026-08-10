<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$root = '../';
include '../lib.php';

if (isset($_GET['a'])){
    $artist = urldecode($_GET['a']);
    $details = null;
    $spotlight_artists = json_decode(file_get_contents('../artists.json'), true);
    foreach ($spotlight_artists as $match_name => $potential_match){
        if (isset($potential_match['permalink']) && $potential_match['permalink'] == $artist){
            $artist = $match_name;
	    $details = $potential_match;
        }
    }
} else {
    header('Location: ../');
}

?>
<!DOCTYPE html>
<?php startup();?>
<html lang="en">
    <head>
	<base href="../">
	<?php renderSEO($artist.' - Seasoning Artist Spotlight', 'https://seasoning.live/artist/'.getArtistLink($artist, $details)); ?>
	<link rel="stylesheet" href="style.css?v=<?php echo file_get_contents($root.'css-version.txt'); ?>">
    </head>
    <?php echo $analytics ?>
    
    <body>
	<?php
	renderTitle('<span style="opacity: 0.75">Artist Spotlight:</span> '.$artist);
	renderArtistInfo($artist);
	?>
	
	<div class="secondary-background">
	    <?php
            renderPageBreak(1, 'primary');
	    renderUpcomingAndPastEvents($artist, ' featuring '.$artist);
	    ?>
	</div>
	<?php renderPageBreak(2, 'secondary'); ?>
    </body>

    <?php renderFooter() ?>
</html>

<script type="module" src="scripts.js"></script>
