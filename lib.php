<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($root)){
    $root = '';
}

function readJSON($filename, $relational=true, $sort=true){
    global $root;
    $json = json_decode(file_get_contents($root.$filename), $relational);
    if ($sort){
	usort($json, function ($a, $b) {
	    return $b['date'] <=> $a['date'];
	});
    }
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
function renderArtistInfo($artist){
    $artists_json = readJSON('artists.json', true, false);
    if (isset($artists_json[$artist])){
	$artist_json = $artists_json[$artist];
	$started = false;
	$links = [];
	foreach (['Instagram','Facebook','SoundCloud','Bandcamp','Resident Advisor','Website'] as $link){
	    if (isset($artist_json[strtolower($link)])){
		if (!$started){
		    $started = true;
		}
		$links[] = '<a class="artist-link" href="'.$artist_json[strtolower($link)].'">'.$link.'</a>';
	    }
	}
	if ($started | isset($artist_json['bio'])){
	    echo '<div class="paragraph" style="margin-top: 1rem"><div class="artist-info"><span><h3 style="margin-top: 1rem;">About</h3>';
	    if (isset($artist_json['bio'])){
		echo $artist_json['bio'];
	    }
	    echo '</span><span class="artist-links">'.join('<span style="margin: 0 5px">/</span>', $links).'</span></div>';
	    if (file_exists('../images/artists/'.urlencode($artist).'.jpg')){
		echo '<img width="0" height="0" alt="Profile photo for '.$artist.'" src="images/artists/'.urlencode($artist).'.jpg">';
	    }
	    if (isset($artist_json['embed'])){
		echo '
<iframe class="artist-embed" width="100%" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/soundcloud%253Atracks%253A'.$artist_json['embed'].'&color=%2331e5e6&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true"></iframe>
		';
	    }
	    echo '</div><br><hr>';
	}
    }
}
function renderEventsForArtist($artist){
    $events_json = readJSON('events.json');
    $started = false;
    foreach ($events_json as $event_key => $event){
	if (isset($event['artists'])){
	    if (in_array($artist, $event['artists'])){
		if (!$started){
		    echo '<h3 style="margin-top: 2rem;">Shows</h3><div class="paragraph" style="margin-top: 1rem"><div class="event-list">';
		    $started = true;
		}
		renderEvent($event_key, $event);
	    }
	}
    }
    if ($started){
	echo '</div></div>';
    }
}


$seo = '
<meta charset="utf-8">
     <meta name="description" content="Building durable scenes in a thriving dance music ecosystem, inspired by the spirit of rave.">
     <meta property="og:title" content="Seasoning - Live Events">
     <meta property="og:description" content="Building durable scenes in a thriving dance music ecosystem, inspired by the spirit of rave.">
<meta name="keywords" content="Stroud, Bristol, London, Rave, Live, Events, Performance, Club, Dance, Music, Scene, Studio, Community, Culture, Collective, Party">
     <meta property="og:image" content="">
     <meta property="og:url" content="https://seasoning.live">
     <title>Seasoning - Live Events</title>

<link rel="icon" type="image/png" href="favicon/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="favicon/favicon.svg" />
<link rel="shortcut icon" href="favicon/favicon.ico" />
<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png" />
<meta name="apple-mobile-web-app-title" content="Seasoning" />
<link rel="manifest" href="favicon/site.webmanifest" />
<meta property="og:image" content="favicon/sharing.png">
';

$analytics = '
<!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-DJ0H3P8DZ0"></script>
    <script>
     window.dataLayer = window.dataLayer || [];
     function gtag(){dataLayer.push(arguments);}
     gtag("js", new Date());
     gtag("config", "G-DJ0H3P8DZ0");
    </script>
';

$tagline = '<span>l</span><span>i</span><span>v</span><span>e</span><span></span><span>e</span><span>v</span><span>e</span><span>n</span><span>t</span><span>s</span><span></span><span>i</span><span>n</span><span></span><span>t</span><span>h</span><span>e</span><span></span><span>s</span><span>o</span><span>u</span><span>t</span><span>h</span><span></span><span>w</span><span>e</span><span>s</span><span>t</span><span></span><span>&</span><span></span><span>b</span><span>e</span><span>y</span><span>o</span><span>n</span><span>d</span>';
?>
