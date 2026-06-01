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
        uasort($json, function ($a, $b) {
            return $b['date'] <=> $a['date'];
        });
    }
    return $json;
}
function renderEvent($event_key, $event){
    global $root;
    echo '<div class="event" tabindex="0">';
    if (isset($event['name'])){
	echo '<span class="event-name">'.$event['name'].'</span><hr>';
    }
    echo '<span class="event-date">'.date("d.m.Y",strtotime($event['date'])).'</span>';
    echo '<span class="event-city">'.$event['city'].'</span>';
    echo '<span class="event-venue">'.$event['venue'].'</span>';
    
    if (isset($event['artists'])){
        echo '<hr>';
        renderArtistList($event['artists'],'pale-text');
    }
    if (isset($event['permalink'])){
        echo '<a href="'.$event['permalink'].'" class="event-view-poster">See More</a>';
    } else {
        echo '<a href="event?e='.$event_key.'" class="event-view-poster">See More</a>';
    }
    /*
       if (array_key_exists('image',$event)){
       $image_path = 'images/event-posters/'.$event['image'].'.jpg';
       echo '<span class="event-view-poster">View Poster</span>';
       echo '<img alt="Poster for Seasoning event on '.date("d.m.Y",strtotime($event['date'])).' at '.$event['venue'].' in '.$event['city'].'" class="event-poster" src="'.$image_path.'">';
       }*/
    echo '</div>';
}
function getDaysRemaining($date){
    $days_remaining = round((strtotime($date) - strtotime(date('Y-m-d'))) / 86400);
    if ($days_remaining == 0){
        $text = '(TODAY!)';
    } else if ($days_remaining < 0){
        $text = '(This event has been and gone)';
    } else {
        $text = '('.$days_remaining.' days to go)';
    }
    return $text;
}
function renderEventDetails($event){
    echo '<div class="paragraph"><span><span class="pale-text">Date:</span> '.date("d M Y",strtotime($event['date']));
    if (isset($event['end-date'])){
        echo ' - '.date("d M Y",strtotime($event['end-date']));
    }
    echo ' <span class="pale-text">'.getDaysRemaining($event['date']).'</span>';
    echo '<br><span class="pale-text">Venue:</span> '.$event['venue'].', '.$event['city'];
    if (isset($event['artists'])){
        echo '<br><span class="pale-text">Artists:</span> ';
        renderArtistList($event['artists']);
    }
    if (isset($event['description'])){
        echo '<br><br>'.$event['description'];
    }
    if (isset($event['ra'])){
        echo '<iframe src="https://ra.co/promoters/'.$event['ra'].'/widgets/events?theme=dark" height="100%" width="100%" style="border: none;">';
    }
    echo '</span>';
    if (isset($event['image'])){
        //echo '<style>body::before { background-image: url(images/event-posters/'.$event['image'].'.jpg); filter: blur(20px) contrast(0.3) } h1 { color: white; }</style>';
    echo '<img alt="Poster for Seasoning event on '.date("d.m.Y",strtotime($event['date'])).' at '.$event['venue'].' in '.$event['city'].'" src="images/event-posters/'.$event['image'].'.jpg">';
    }
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
function getEventFromId($id){
    $json = readJSON('events.json', true, false);
    return $json[$id];
}
function getEventValueList($key){
    $events_json = readJSON('events.json');
    $values = [];
    foreach ($events_json as $event){
        if (array_key_exists($key, $event)){
            if (is_array($event[$key])){
                foreach ($event[$key] as $value){
                    if (!in_array($value, $values)){
                        $values[] = $value;
                    }
                }
            } else if (!in_array($event[$key], $values)){
                $values[] = $event[$key];
            }
        }
    }
    sort($values);
    return $values;
}
function getArtistList(){
    return getEventValueList('artists');
}
function renderArtistList($artists=false, $class=''){
    if (!$artists){
	$artists = getArtistList();
    }
    echo '<span class="'.$class.'"><span>';
    foreach ($artists as $artist){
        echo '<a class="artist-link" href="artist?a='.urlencode($artist).'">'.$artist.'</a>';
        if ($artist != $artists[count($artists)-1]){
            echo ' / ';
        }
    }
    echo '</span></span>';
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
function renderFooter(){
    echo '
<footer>
<a href="https://seasoning.live" id="footerLink">Seasoning.live 2026</a>
<div>
<a href="https://www.instagram.com/seas0ning_">Instagram</a><span style="margin: 0 0.5rem">/</span>
<a href="https://www.facebook.com/Seas0ning">Facebook</a><span style="margin: 0 0.5rem">/</span>
<a href="https://ra.co/promoters/119677">Resident Advisor</a><span style="margin: 0 0.5rem">/</span>
<a href="https://soundcloud.com/seas0ning">SoundCloud</a>
</div></footer>
    ';
}
function renderTitle($subheading){
    //echo '<a href=""><h1 class=""><span>S</span><span>e</span><span>a</span><span>s</span><span>o</span><span>n</span><span>i</span><span>n</span><span>g</span></h1></a><h2 class="" movementpx="4">'.$subheading.'</h2>';
    echo '<a href="https://seasoning.live"><img class="paragraph" src="images/seasoning-logo-pink.svg" style="margin-top: 4rem" id="logo-img">
	<h1 style="display: none">Seasoning</h1></a><h2>'.$subheading.'</h2>';
}

function renderSEO($title='Seasoning - Live Events', $canonical='https://seasoning.live', $favicon_path='favicon'){
    echo '
<meta charset="utf-8">
     <meta name="description" content="Building durable scenes in a thriving dance music ecosystem, inspired by the spirit of rave.">
     <meta property="og:title" content="Seasoning - Live Events">
     <meta property="og:description" content="Building durable scenes in a thriving dance music ecosystem, inspired by the spirit of rave.">
<meta name="keywords" content="Stroud, Bristol, London, Rave, Live, Events, Performance, Club, Dance, Music, Scene, Studio, Community, Culture, Collective, Party">
     <meta property="og:url" content="'.$canonical.'">
     <title>'.$title.'</title>
     <link rel="icon" type="image/png" href="'.$favicon_path.'/favicon-96x96.png" sizes="96x96" />
     <link rel="icon" type="image/svg+xml" href="'.$favicon_path.'/favicon.svg" />
     <link rel="shortcut icon" href="'.$favicon_path.'/favicon.ico" />
     <link rel="apple-touch-icon" sizes="180x180" href="'.$favicon_path.'/apple-touch-icon.png" />
     <meta name="apple-mobile-web-app-title" content="Seasoning" />
     <link rel="manifest" href="'.$favicon_path.'/site.webmanifest" />
     <meta property="og:image" content="'.$favicon_path.'/sharing.png">
     <link rel="canonical" href="'.$canonical.'"/>
     ';
}

function getArtistOptions(){
    $artist_options = '';
    foreach (getArtistList() as $artist){
        $artist_options .= '<option value="'.$artist.'">'.$artist.'</option>';
    }
    return $artist_options;
}
function renderArtistEditor($artist){
    $artists_json = readJSON('artists.json', true, false);
    if (isset($artists_json[$artist])){
        $artist_json = $artists_json[$artist];
    } else {
        $artist_json = [];
    }
    echo '<h2>Editing: '.$artist.'</h2>';
    echo '<form method="POST">';
    foreach (["Bio","Instagram","SoundCloud","Bandcamp","Resident Advisor","Website","Embed"] as $category){
        $key = strtolower($category);
        $name = str_replace(' ','-',$key);
        echo '<label for="'.$name.'">'.$category.'</label><br>';
        echo '<textarea id="'.$name.'" name="'.$name.'">';
        if (isset($artist_json[$key])){
	    echo $artist_json[$key];
        }
        echo '</textarea><br>';
    }
    echo '<input type="submit" value="Submit Edits"></form>';
}
function renderAdmin($post){
    echo '<style>textarea { width: 20rem; height: 5rem; }</style>';
    if (isset($post['pwd'])){
        if ($post['pwd'] == 'H{*z_l$esyGVN.(('){
	    echo '<form method="POST"><label for="artist-selector">Select Artist To Edit</label><br><select id="artist-selector" name="artist">'.getArtistOptions().'</select><input type="submit" value="Edit Artist"></form>';
        } else {
	    echo 'wrong password!!';
        }
    } else if (isset($post['artist'])){
        renderArtistEditor($post['artist']);
    } else if (isset($post['bio'])){
        echo 'submit edits /  confirm';
    } else {
        echo '<form method="POST"><label for="pwd">Enter Password</label><br><input id="pwd" name="pwd"><input type="submit" value="Enter"></form>';
    }
}

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
