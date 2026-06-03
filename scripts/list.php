<?php
include 'lib.php';

$events_json = readJSON('events.json');
$artists = [];
foreach ($events_json as $event){
    if (isset($event['artists'])){
	foreach ($event['artists'] as $artist){
	    if (isset($artists[$artist])){
		$artists[$artist] += 1;
	    } else {
		$artists[$artist] = 1;
	    }
	}
    }
}
arsort($artists);

foreach ($artists as $artist => $count){
    foreach ($artists as $other_artist => $other_count){
	if (levenshtein($artist, $other_artist) < 3 && $artist != $other_artist){
	    echo "${artist} may be ${other_artist}<br>";
	}
    }
}

//echo var_dump($artists);
?>
