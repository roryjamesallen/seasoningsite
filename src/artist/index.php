<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$root = '../';
include '../../lib.php';

if (isset($_GET['a'])){
    $artist = urldecode($_GET['a']);
    $details = null;
    $spotlight_artists = json_decode(file_get_contents('../artists.json'), true);
    foreach ($spotlight_artists as $match_name => $potential_match){
        if (
	    ((isset($potential_match['permalink']) && $potential_match['permalink'] == $artist)
		or ($match_name == $artist))
	    and isset($potential_match['instagram'])){
	    header('Location: '.$potential_match['instagram']);
	    exit();
	    echo 'found '.$potential_match['instagram'];
	    $artist = $match_name;
	    $details = $potential_match;
        }
    }
    header('Location: ../');
    exit();
} else {
    header('Location: ../');
    exit();
}
?>
