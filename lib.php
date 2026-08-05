<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
date_default_timezone_set("Europe/London");

// ==== NON HTML FUNCTIONS ====

function startup(){ // Initialise the page (after headers have been sent)
    if (!isset($root)){
        $root = '';
    }
    if (isset($popup)){
        echo '<script>popup = <?php echo json_encode($popup);?></script>';
    } else {
        echo '<script>popup = false</script>';
    }
}
function cssVersion(){ // Dynamically update css version of all files
    global $root;
    echo file_get_contents($root.'css-version.txt');
}
function readJSON($filename, $relational=true, $sort=true){ // Read a JSON file on the server
    global $root;
    $json = json_decode(file_get_contents($root.$filename), $relational);
    if ($sort){
        uasort($json, function ($a, $b) { // Sort the relational array by date field
            return $b['date'] <=> $a['date'];
        });
    }
    return $json;
}
function getEndOfPermalink($event){ // e.g. event/outlook-origins-2026 -> outlook-origins-2026
    $permalink_elements = explode('/', $event['permalink']);
    return end($permalink_elements);
}
function getEventFromId($id){
    $json = readJSON('events.json', true, false);
    if (in_array($id, array_keys($json))){ // Event exists ($id is key in events.json)
        if (isset($json[$id]['permalink'])){ // $id is not permalink but permalink exists
            header("HTTP/1.1 301 Moved Permanently"); // Redirect
            header('Location: '.getEndOfPermalink($json[$id]));
            die();
        } else {
            return $json[$id]; // No permalink exists so return event
        }
    } else {
        foreach ($json as $event){ // $id isn't a key in events.json but might be a permalink
            if (isset($event['permalink'])){ // $id is a valid permalink to an event
                if ($id == getEndOfPermalink($event)){
                    return $event;
                }
            }
        }
    }
}
function getEventValueList($key){ // Get an array of unique values across all events for a given key
    $events_json = readJSON('events.json');
    $values = [];
    foreach ($events_json as $event){
        if (array_key_exists($key, $event)){
            if (is_array($event[$key])){ // If the value is an array
                foreach ($event[$key] as $value){ // Loop through the array
                    if (!in_array($value, $values)){ // Only add the value if it's not already in values
                        $values[] = $value;
                    }
                }
            } else if (!in_array($event[$key], $values)){ // Not an array and not already in values
                $values[] = $event[$key];
            }
        }
    }
    sort($values); // Sort (this function is used for artist list so alphabetical)
    return $values;
}
function getArtistList(){ // Get a unique array of artists from all events
    return getEventValueList('artists');
}
function getEventsForArtist($artist){ // Get an array of events (full event json for each) that an artist has played/is playing at
    $artist_events = [];
    $events_json = readJSON('events.json');
    foreach ($events_json as $event_key => $event){
        if (isset($event['artists'])){
            if (in_array($artist, $event['artists'])){
                $artist_events[$event_key] = $event;
            }
        }
    }
    return $artist_events;
}

// ==== GENERATOR FUNCTIONS (Generate HTML and and return it) ====

function generateEventTicketOffers($event){ // For Google Rich Results https://developers.google.com/search/docs/appearance/structured-data/event#add-structured-data
    $link = false;
    if (isset($event['fixr'])){
        $link = generateFIXRLink($event['fixr']);
    } else if (isset($event['tickets'])){
        $link = $event['tickets'];
    }
    if ($link){ // Only show the offers section if a link exists for the event
        return '"offers": {
        "@type": "Offer",
        "url": "'.$link.'"
      },';
    }
}
function generateEventDescription($event, $extra=false, $schema=true){
    if ($schema){
        $description = '"description": "';
    } else {
        $description = '';
    }
    if (isset($event['description'])){
        $description .= $event['description'];
    } else {
        $description .= generateEventTitle($event, $extra);
    }
    if ($schema){
        $description .= '",';
    }
    return $description;
}
function generateEventTitle($event, $extra=false){ // $extra=true will add 'at Venue, City - dd.mm.yyyy' to the end of the title
    if (isset($event['name'])){
        $title = $event['name']; // e.g. Seasoning Festival 2026
    } else if (isset($event['artists'])){
        if (count($event['artists']) == 1){
            $title = $event['artists'][0]; // e.g. Lovellious
        } else if (count($event['artists']) == 2){
            $title = $event['artists'][0].' & '.$event['artists'][1]; // e.g. Lovellious & Bakey
        } else {
            $title = $event['artists'][0].', '.$event['artists'][1].' & More'; // e.g. Lovellious, Bakey & More
        }
    }
    if ($extra){
        $title .= ' at '.$event['venue'].', '.$event['city'].' - '.date("d M Y",strtotime($event['date'])); // e.g. Lovellious, Bakey & More at SVA, Stroud - 01.02.2026
    }
    return $title;
}
function generateFIXRLink($fixr_id){ // Function used in case the FIXR link format changes
    return 'https://fixr.co/event/'.$fixr_id;
}
function generateDaysRemaining($date){ // Generate text to say how many days left (or event been and gone) based on event date
    $days_remaining = floor((strtotime($date) - strtotime(date('Y-m-d'))) / 86400); // Floor so that if the event is later in the day tomorrow it won't round up to 2 days
    if ($days_remaining == 0){
        $text = '(Today!)';
    } else if ($days_remaining == 1){
        $text = '(Tomorrow!)';
    } else if ($days_remaining < 0){
        $text = '(This event has been and gone)';
    } else {
        $text = '('.$days_remaining.' days to go)';
    }
    return $text;
}

// ==== RENDERING FUNCTIONS (Echo actual HTML) ====

function renderEvent($event_key, $event, $reverse=false){ // Render an event in a list of events (preview)
    global $root;
    if ($reverse){
        $class = 'event-reverse'; // CSS to reverse the direction of the event flexbox
    } else {
        $class = '';
    }
    echo '<div class="event-flex paragraph '.$class.'"><div class="event-info-flex">';
    
    if (isset($event['name'])){ // Show the event's name if set and add some stars behind it
        echo ' <span class="event-name-flex star-container" stars="3" star-size="5" star-transition="60"><h4>'.$event['name'].'</h4></span>';
    }
    
    echo '<span class="event-location-flex"><span class="event-city-flex">'.$event['venue'].' ('.$event['city'].')</span><span class="event-separator-icon">✹</span><span class="event-date-flex">'.date("d.m.Y",strtotime($event['date'])).'</span></span>'; // Show the event's venue, city, and date
    
    if (isset($event['artists'])){
        renderArtistList($event['artists'],'pale-text', 10); // Show a list of the artists playing the event (up to 10)
    }
    
    if (isset($event['permalink'])){ // Override default link to event page
        $link = $event['permalink'];
    } else {
        $link = 'event/'.$event_key; // Default link is just the event's key
    }
    echo '<a href="'.$link.'" class="big-button"><span>See Details</span></a></div></div>';
}
function renderEventSchema($event){ // For Google Rich Results https://developers.google.com/search/docs/appearance/structured-data/event#add-structured-data
    $end_date = $event['date']; // Default is single day event (end date = start date)
    if (isset($event['end-date'])){ // Update end date if it's actually a multi-day event
        $end_date = $event['end-date'];
    }
    $images = '';
    if (isset($event['image'])){
        $images = '
      "image": [
        "https://seasoning.live/images/event-posters/'.$event['image'].'.jpg"
      ],'; // Add the event poster as the event's image
    }
    $artists = '';
    if (isset($event['artists'])){
        $artists = '
      "performer": [';
        foreach ($event['artists'] as $index => $artist){
            $artists .= '
        {
          "@type": "Person",
          "name": "'.$artist.'"
        }'; // Add each artist playing as a performer
            if ($index != count($event['artists']) - 1){
                $artists .= ','; // Only add a comma if this isn't the last artist
            }
        }
        $artists .= '
      ],'; // Close the performers array
    }
    
    echo '<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Event",
      "name": "'.generateEventTitle($event).'",
      "startDate": "'.$event['date'].'",
      "endDate": "'.$end_date.'",
      "eventStatus": "https://schema.org/EventScheduled",
      "location": {
        "@type": "Place",
        "name": "'.$event['venue'].'",
        "address": {
          "@type": "PostalAddress",
          "addressLocality": "'.$event['city'].'"
        }
      },'.$images.$artists.'
      '.generateEventDescription($event, true).'
      '.generateEventTicketOffers($event).'
      "organizer": {
        "@type": "Organization",
        "name": "Seasoning",
        "url": "https://seasoning.live"
      }
}
</script>'; // Echo the schema into the HTML <head>
}
function renderOrganisationSchema(){ // For Google Rich Results https://developers.google.com/search/docs/appearance/structured-data/event#add-structured-data
echo '<script type="application/ld+json">
{
      "@context": "https://schema.org",
      "@type": "Organization",
      "url": "https://seasoning.live",
      "logo": "https://seasoning.live/favicon/web-app-manifest-512x512.png",
      "name": "Seasoning",
      "description": "Rave Culture is Folk Culture. Building durable scenes in a thriving dance music ecosystem, inspired by the spirit of rave.",
      "email": "fraser@seasoning.live",
      "foundingDate": "2022-04-02",
      "sameAs": [
        "https://www.instagram.com/seas0ning_",
        "https://www.facebook.com/Seas0ning",
        "https://ra.co/promoters/119677",
        "https://soundcloud.com/seas0ning",
        "https://fixr.co/organiser/666971023"
      ]
    }
</script>';
}
function renderEventDetails($event){ // The actual event page (not preview in a list)
    echo '<div class="paragraph"><div style="flex-basis: 100%"><span class="pale-text">Date:</span> '.date("d M Y",strtotime($event['date']));
    if (isset($event['end-date'])){
        echo ' - '.date("d M Y",strtotime($event['end-date']));
    }
    echo ' <span class="pale-text">'.generateDaysRemaining($event['date']).'.</span>';
    echo '<br><span class="pale-text">Venue:</span> '.$event['venue'].', '.$event['city'].'.';
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
    if (isset($event['fixr'])){
        echo '<a class="fixr-link" href="'.generateFIXRLink($event['fixr']).'">Buy Tickets</a>';
    }
    if (isset($event['tickets'])){
        echo '<a class="fixr-link" href="'.$event['tickets'].'">Buy Tickets</a>';
    }
    echo '</div>';
    if (isset($event['paragraphs'])){
        foreach ($event['paragraphs'] as $paragraph){
            echo '<div class="paragraph-html">'.$paragraph.'</div>';
        }
    }
    if (isset($event['image'])){
        echo '<img alt="Poster for Seasoning event on '.date("d.m.Y",strtotime($event['date'])).' at '.$event['venue'].' in '.$event['city'].'" src="images/event-posters/'.$event['image'].'.jpg">';
    }
    echo '</div>';
}
function renderUpcomingAndPastEvents($artist=false, $extra_text=''){ // Toggleable list as shown on the homepage and artist pages
    if ($artist){
        $events = getEventsForArtist($artist); // Restrict to only the artist's events
    } else {
        $events = false; // False will cause renderEventList to render all events regardless of artist
    }
    
    ob_start(); // Buffer the output so the output of event rendering can be checked before actually outputting to HTML
    $show_past = !renderEventList('upcoming', $events, $extra_text); // There are no upcoming events
    renderEventList('past', $events, $extra_text, $show_past); // Render past events
    $event_dom = ob_get_contents(); // Get the HTML for both upcoming and past
    ob_end_clean(); // Clear the buffer
    if ($show_past){ // There are upcoming events so have that tab toggled on
        $class_one = ' toggler-off';
        $class_two = '';
    } else { // No upcoming events so show past instead
        $class_one = '';
        $class_two = ' toggler-off';
    }
    echo '<h2 class="" collapse="events">Events</h2><div id="events"><h3>
<span class="toggler'.$class_one.'" toggle="events-upcoming">Upcoming</span>
 /
<span class="toggler'.$class_two.'" toggle="events-past">Past</span></h3>';
    echo $event_dom;
    echo '</div>';
}
function renderEventList($mode='all', $events=false, $extra_text='', $force_show=false){ // Can be past, upcoming, for artist, or all events
    if (!$events){
        $events = readJSON('events.json'); // No specific events array passed (artist events) so get all events
    }
    $filtered_events = [];
    $now = new DateTime('now');
    foreach ($events as $event_key => $event){
        $event_date = new DateTime($event['date']);
        if ($mode == 'all' or ($mode == 'past' and $event_date < $now) or ($mode == 'upcoming' and $event_date > $now)){ // If all events are being shown or the date is allowed by the mode
            $filtered_events[$event_key] = $event;
        }
    }
    
    if (count($filtered_events) > 0){ // There are events for this time period
        if ($mode == 'upcoming'){
            ksort($filtered_events); // If upcoming then show oldest (first to happen) at the top
        } else {
            krsort($filtered_events); // If past then show newest (most recently gone by) at the top
        }
        
        if ($mode == 'past' && $force_show == false){ // Past events shown if force_show == true
            $p_class = 'toggled-off';
        } else {
            $p_class = '';
        }
        
        echo '<div class="event-list"><div class="'.$p_class.'" id="events-'.$mode.'">';
        $reverse = true;
        foreach ($filtered_events as $event_key => $event){
            renderEvent($event_key, $event, $reverse);
            $reverse = !$reverse; // Toggle reverse to the opposite for the next event
        }
        echo '</div></div>';
        return true;
    } else {
        echo '<p class="paragraph toggled-off" id="events-'.$mode.'">There are no '.$mode.' events'.$extra_text.'</p>'; // Extra text allows this to be customised for artist event lists
        return false;
    }
}
function renderArtistList($artists=false, $class='', $limit=false){ // Render a list of artists from a given array
    global $root;
    $spotlight_artists = json_decode(file_get_contents($root.'artists.json'), true); // Artists with manually set information in artists.json
    if (!$artists){ // Render list of all artists
        $artists = getArtistList();
    }
    echo '<span class="artist-list '.$class.'">';
    foreach ($artists as $index => $artist){
        if (!$limit or $index < $limit){ // As long as the number of artists listed hasn't hit the limit (or no limit exists)
            if (isset($spotlight_artists[$artist])){ // Artist has some manually set information from artists.json
                if (isset($spotlight_artists[$artist]['permalink'])){ // Artist has a permalink (used for prettier links vs urlencode)
                    $artist_link = $spotlight_artists[$artist]['permalink'];
                } else {
                    $artist_link = urlencode($artist); // No permalink so just use artist's name urlencoded
                }
                echo '<a class="artist-link" href="artist/'.$artist_link.'">'.$artist.'</a>';
            } else {
                echo '<span class="artist-link">'.$artist.'</span>'; // Don't use a link if they have no info on their page
            }
            if (!$limit or $index != $limit - 1){ // Add a comma before the next artist
                if ($artist != $artists[count($artists)-1]){
                    echo ', ';
                }
            } else if ($limit && $index == $limit - 1 && count($artists) > $limit){ // Hit the limit so add an ellipsis
                echo '...';
            }
        }
    }
    echo '.</span>';
}
function renderArtistInfo($artist){ // Render an artist's whole page
    $artists_json = readJSON('artists.json', true, false);
    if (isset($artists_json[$artist])){ // Artist has manually set information in artists.json
        $artist_json = $artists_json[$artist];
        $started = false; // Used to set if any information is set that should cause the info box to be rendered
        $links = [];
        foreach (['Instagram','Facebook','SoundCloud','Bandcamp','Resident Advisor','Website'] as $link){
            if (isset($artist_json[strtolower($link)])){
                if (!$started){
                    $started = true; // Some info that will go in the info box exists
                }
                $links[] = '<a class="artist-link" href="'.$artist_json[strtolower($link)].'">'.$link.'</a>';
            }
        }
        if ($started or isset($artist_json['bio'])){ // If there is something that needs to be shown in the info box
            echo '<div class="paragraph" style="margin-top: 2rem"><div class="artist-info"><span><h3 style="margin-top: 1rem;">About</h3>';
            if (isset($artist_json['bio'])){
                echo $artist_json['bio'];
            }
            echo '</span><span class="artist-links">'.join('<span style="margin: 0 5px">/</span>', $links).'</span></div>';
            if (file_exists('../images/artists/'.urlencode($artist).'.jpg')){
                echo '<img width="0" height="0" alt="Profile photo for '.$artist.'" src="images/artists/'.urlencode($artist).'.jpg">';
            }
            if (isset($artist_json['embed'])){ // SoundCloud embed
                echo '
    <iframe class="artist-embed" width="100%" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/soundcloud%253Atracks%253A'.$artist_json['embed'].'&color=%2331e5e6&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true"></iframe>
    ';
            }
            echo '</div><br>';
        }
    }
}
function renderPageBreak($version=1, $background='primary'){ // Background should be set to the colour of the section before/above
    if ($version != 1){
        $version_text = '-'.$version;
    } else {
        $version_text = '';
    }
    echo '<div class="page-break-image pb'.$version.' '.$background.'-background"></div>';
}
function renderFooter(){ // HTML footer with the logo, current year, and social links
    echo '
    <footer>
    <a href="https://seasoning.live" id="footerLink" class="star-container" stars="10" star-size="5">Seasoning.live '.date("Y").'</a>
    <div>
    <a href="https://www.instagram.com/seas0ning_">Instagram</a><span style="margin: 0 0.5rem">/</span>
    <a href="https://www.facebook.com/Seas0ning">Facebook</a><span style="margin: 0 0.5rem">/</span>
    <a href="https://ra.co/promoters/119677">Resident Advisor</a><span style="margin: 0 0.5rem">/</span>
    <a href="https://soundcloud.com/seas0ning">SoundCloud</a>
    </div>
<div class="website-credit"><span>Website by <a href="mailto:rory@hogwild.uk">Rory Allen</a></span></div>
</footer>
    <script src="https://web-cdn.fixr.co/scripts/fixr-checkout-widget.v1.min.js"></script>
    ';
}
function renderTitle($subheading){ // The full page title with logo and stars. The real <h1> is hidden but present for SEO
    echo '<div id="logo-container" class="paragraph star-container" stars="20" star-size="2"><a href="https://seasoning.live"><img loading="eager" src="" id="logo-img" alt="Pink hand drawn logo for Seasoning"></a></div>
    <h1 style="display: none">Seasoning - Rave Culture is Folk Culture</h1></a><h2 style="margin: -1.5rem auto 1rem;">'.$subheading.'</h2>
    <style>.fixr-links-widget { --fixr-primary: var(--pink); }</style>';
}

function renderSEO($title='Seasoning - Rave Culture is Folk Culture', $canonical='https://seasoning.live', $description='Rave Culture is Folk Culture. Building durable scenes in a thriving dance music ecosystem, inspired by the spirit of rave.', $favicon_path='favicon'){ // HTML head content for SEO, favicon, and stylesheets etc
    echo '
<meta charset="utf-8">
     <meta name="description" content="'.$description.'">
     <meta property="og:title" content="Seasoning - Live Events">
     <meta property="og:description" content="'.$description.'">
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
<meta name="viewport" content="width=device-width, initial-scale=1" />
     ';
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
'; // Allows Google Analytics to view page stats

/*
function getArtistOptions(){ // Not yet fully implemented, used in the admin page. Renders all artists as an HTML selection list to add to new events
    $artist_options = '';
    foreach (getArtistList() as $artist){
        $artist_options .= '<option value="'.$artist.'">'.$artist.'</option>';
    }
    return $artist_options;
}
function renderArtistEditor($artist){ // Not yet fully implemented, used in the admin page.
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
function renderAdmin($post){ // Not yet fully implemented, used in the admin page.
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
    }*/
?>
