<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($root)){
    $root = '';
}

function readJSON($filename){
    global $root;
    $json = json_decode(file_get_contents($root.$filename), true);
    usort($json, function ($a, $b) {
	return $b['date'] <=> $a['date'];
    });
    return $json;
}
function renderEvent($event_key, $event){
    global $root;
    echo '<div class="event" tabindex="1"><span class="event-date">'.date("d.m.Y",strtotime($event['date'])).'</span>';
    echo '<span class="event-city">'.$event['city'].'</span>';
    echo '<span class="event-venue">'.$event['venue'].'</span><hr>';
    if (isset($event['name'])){
	echo '<span class="event-name"></span>';
    }
    if (isset($event['artists'])){
	$artist_links = [];
	foreach ($event['artists'] as $artist){
	    $artist_links[] = '<a class="artist-link" href="artist?a='.urlencode($artist).'">'.$artist.'</a>';
	}
	echo join('<span style="margin: 0 5px">/</span>', $artist_links);
    }
    echo '<span class="event-view-poster">View Poster</span>';
    $image_path = 'images/event-posters/'.$event['image'].'.jpg';
    echo '<img class="event-poster" src="'.$image_path.'">';
    echo '</div>';
}
function renderEventList(){
    $json = readJSON('events.json');
    echo '<div class="event-list">';
    foreach ($json as $event_key => $event){
	renderEvent($event_key, $event);
    }
    echo '</div>';
}
function renderEventsForArtist($artist){
    $json = readJSON('events.json');
    echo '<div class="event-list">';
    foreach ($json as $event_key => $event){
	if (isset($event['artists'])){
	    if (in_array($artist, $event['artists'])){
		renderEvent($event_key, $event);
	    }
	}
    }
    echo '</div>';
}


$tagline = '<span>l</span><span>i</span><span>v</span><span>e</span><span></span><span>e</span><span>v</span><span>e</span><span>n</span><span>t</span><span>s</span><span></span><span>i</span><span>n</span><span></span><span>t</span><span>h</span><span>e</span><span></span><span>s</span><span>o</span><span>u</span><span>t</span><span>h</span><span></span><span>w</span><span>e</span><span>s</span><span>t</span><span></span><span>&</span><span></span><span>b</span><span>e</span><span>y</span><span>o</span><span>n</span><span>d</span>';
?>
