<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$root = '../';
include '../lib.php';

$event_id = '20260529';
$event = getEventFromId($event_id);

$date_now = new DateTime('now');
$date_start = new DateTime('2026-05-29T12:00:00');

$debug = false;
if ($debug){
$debug_interval = DateInterval::createFromDateString('-1 hour');
$date_now = date_add($date_now, $debug_interval);
}

$time_now_formatted = $date_now->format('l H:i');
$seconds = $date_now->format('s');

$diff = date_diff($date_now, $date_start);

if ($diff->format('%r') == '-'){
    $time_days = 'Is happening now';
    $time_left = '';
} else {
    $time_days = $diff->format('It all begins in %d days');
    $time_left = $diff->format('%h hours, <span id="minutes">%i</span> minutes, <span id="seconds">%s</span> seconds');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
	<base href="<?php echo $root; ?>">
	<?php renderSEO('Seasoning Festival 2026 - Rave Culture Is Folk Culture', 'https://seasoning.live/festival', 'festival/favicon'); ?>
	<link rel="stylesheet" href="style.css?v=<?php echo file_get_contents($root.'css-version.txt'); ?>">
	<link rel="stylesheet" href="festival/festival-style.css?v=5">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    </head>
    <?php echo $analytics ?>

    <style>
     :root {
	 --background: #E9E2D6;
	 --extra: #F391BC;
	 --paragraph: #4F4E20;
     }
     body {
	 background-color: var(--background);
	 color: var(--paragraph);
     }
     .block-children > * {
	 display: block;
     }
     table tr:not(:first-child) {
	 padding: 0.5rem 0;
     }
     table td:not(:first-child){
	 padding-left: 0.5rem;
     }
     #partners {
	 filter: invert(1);
     }
     hr {
	 background-color: var(--paragraph);
     }
     .paragraph, footer, footer a {
	 color: var(--paragraph);
	 border-color: var(--paragraph);
     }
     #timetable, #maps, #map, #campsite-map {
	 width: calc(100% - 4rem);
	 object-fit: contain;
	 max-height: 90vh;
	 display: flex;
	 justify-content: center;
	 padding: 2rem;
     }
     #campsite-map {
	 padding-top: 0;
     }
     #timetable {
	 flex-wrap: wrap;
     }
     #timetable div {
	 flex-basis: 30%;
	 max-height: 100%;
     }
     @media screen and (max-width: 1000px){
	 #maps {
	     flex-wrap: wrap;
	     gap: 2rem;
	 }
	 #timetable {
	     gap: 2rem;
	     max-height: unset;
	 }
	 #timetable div {
	     flex-basis: 100%;
	 }
     }
    </style>
    
    <body>
	<script src="https://web-cdn.fixr.co/scripts/fixr-checkout-widget.v1.min.js"></script>
	<!--<img id="grass" src="festival/grass.png" alt="Stone circle in a grassy field">
	     <img src="festival/seasoning-festival-logo.svg" id="festival-logo" alt="Logo for Seasoning Festival 2026">-->
	<h1 style="transform: none; margin: 1rem auto 0; height: unset; font-size: 3.5rem; text-align: center; z-index: 2; display: none">Seasoning Festival</h1>
	<div class="paragraph" style="margin: 2rem auto">
	    <img style="max-height: unset" src="festival/seasoning-festival-logo.svg">
	</div>

	<h2 style="font-family: Cormorant; color: var(--paragraph); text-align: center">Seasoning festival is over for 2026, thank you for joining us!</h2>

	    
    </body>

    <?php renderFooter() ?>
</html>
<script>
</script>
