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
     .block-children > * {
	 display: block;
     }
     table tr:not(:first-child) {
	 padding: 0.5rem 0;
     }
     table td:not(:first-child){
	 padding-left: 0.5rem;
     }
    </style>
    
    <body>
	<script src="https://web-cdn.fixr.co/scripts/fixr-checkout-widget.v1.min.js"></script>
	<!--<img id="grass" src="festival/grass.png" alt="Stone circle in a grassy field">
	     <img src="festival/seasoning-festival-logo.svg" id="festival-logo" alt="Logo for Seasoning Festival 2026">-->
	<h1 style="transform: none; margin: 1rem auto 0; height: unset; font-size: 3.5rem; text-align: center; z-index: 2; display: block">Seasoning Festival<br><span style="color: white; display: inline-block; font-size: 2.25rem; padding: 0; margin: 0; font-family: Cormorant"><?php echo $time_days; ?><br><span style="color: var(--white); font-size: 1.75rem"><?php echo $time_left; ?></span></span></h1>
	<img src="festival/blue-circle-background.svg" style="position: absolute; top: 25vh; left: 0; width: 100%; z-index: -1" alt="Blue circles background image">
	<img src="festival/lightning-background.svg" style="position: absolute; top: 8vh; left: 0; width: 100%; z-index: -1" alt="Yellow lightning background image">
	<img src="festival/lightning-background.svg" style="position: absolute; top: 100vh; left: 0; width: 100%; z-index: -1" alt="Yellow lightning background image">
	<div class="paragraph" style="margin-top: 1.5rem; gap: 2rem; position: relative">
	    <p style="font-size: 2rem; margin: 0">Only a few tickets remain for Seasoning Festival 2026, with limited single day passes for those of you who can't make it for the whole 3 days.</p>
	    <h2 style="font-size: 2rem; margin: 0; font-family: Milker; "><a href="https://fixr.co/event/738401183">Buy <span style="font-size: 3rem; color: var(--title)">Final release</span><br>tickets</a></h2>
	    <h2 style="font-size: 2rem; margin: 0; font-family: Milker;"><span style="font-size: 3rem; color: var(--title)">Camping</span> & Shuttle Buses</a></h2>
	    <p style="font-size: 2rem; margin: 0">Every weekend ticket includes <strong>free camping</strong>. Regular shuttle buses to and from the venues will be running for those who add the bus pass to their ticket.</p>
	    <p style="margin: 0; font-size: 2rem">Buses will run continuously between these hours to get you back to your tent when each night is over.</p>
	    <table style="font-size: 2rem">
		<tr>
		    <td>Fri</td>
		    <td>1am - 3am</td>
		</tr>
		<tr>
		    <td>Sat</td>
		    <td>3:30am - 5:30am</td>
		</tr>
		<tr>
		    <td>Sun</td>
		    <td>11:30pm - 1:30am</td>
		</tr>
	    </table>
	    <hr class="full">
	    <h2 style="text-align: left; font-family: Milker; font-size: 3rem;"><span style="color: var(--title)"><span style="font-size: 4rem">Rave</span> Culture</span> <span style="color: var(--paragraph)"><br>Is <span style="font-size: 4rem">Folk</span> Culture</span></h2>
	    <p style="text-align: right; font-size: 2rem; margin: 0">Not a weekend away from life, but a durable scene inside it. Something earthy, bass-led, porous and <strong>strange.</strong></p>
	    <p style="font-size: 2rem; margin: 0">At The Goods Shed + SVA<br>Stroud, GL5 3AP</p><h2 style="text-align: right; font-family: Milker; align-self: last baseline; margin-bottom: 0; color: var(--paragraph)"><span style="font-size: 6rem; margin-right: -0.75rem; color: var(--title); display: inline-block; margin-bottom: -0.5rem">3</span> Days<br><span style="font-size: 5rem; margin-right: -0.75rem; margin-top: -0.35rem; display: inline-block; color: var(--title)">3</span> <span style="vertical-align: top">Nights</span></h2>
	    <!--<h2 style="font-family: Milker; margin: 0; text-align: center; background-color: var(--extra); padding: 2rem; color: white; font-size: 2rem" class="full">A Weekend of <strong style="font-size: 3rem">Soundsystem Mysticism</strong> in The Five Valleys</h2>-->

	    <p style="font-size: 2rem; margin: 0" class="full">Bringing together strands of rave that have long run parallel, low-end pressure, percussive intensity, dubwise psychedelia, hypnotic techno and everything in between.</p>
	    
	    <h2 style="font-family: Milker; margin: 0; font-size: 2rem; display: flex; flex-direction: column; gap: 1rem; align-self: end">
		<span>Over <span style="font-size: 5rem; color: var(--title)">60</span><span style="font-size: 3rem">artists</span></span>
		<span style="display: flex; align-items: end; gap: 0.5rem; justify-content: end"><span>moving<br>across</span><span style="font-size: 5rem; color: var(--title); margin-bottom: -0.7rem">4</span><span>stages</span></span>
	    </h2>

	    
	    <div class="full artist-list">
		<?php
		$artists = $event['artists'];
		sort($artists, SORT_NATURAL | SORT_FLAG_CASE);
		$halfway = floor(count($artists) / 2);
		echo '<div>';
		foreach($artists as $index => $artist){
		    if ($index <= $halfway){
			$url = 'https://seasoning.live/artist?a='.urlencode($artist);
			echo "<a href='{$url}'>{$artist}</a><br>";
		    }
		};
		echo '</div><div>';
		foreach($artists as $index => $artist){
		    if ($index > $halfway){
			$url = 'https://seasoning.live/artist?a='.urlencode($artist);
			echo "<a href='{$url}'>{$artist}</a><br>";
		    }
		};
		echo '</div>';
		?>
	    </div>
	    
	    
	    <p style="font-size: 2rem; margin: 0">A space where emerging artists stand alongside those shaping the wider landscape, and where new forms begin to take hold.</p>
	    <h2 style="text-align: right; font-family: Milker; align-self: last baseline; margin-bottom: 0; color: var(--paragraph); font-size:2rem">A programme<br> built on <span style="font-size: 3rem; color: var(--title); display: inline-block; margin-bottom: -0.5rem">connection</span> not hierarchy</h2>
	    
	    <div style="border: 2px solid var(--title); padding: 0.5rem; max-width: fit-content; margin: 3rem auto 0; background-color: var(--background); font-size: 2rem">
		<a href="https://fixr.co/event/seasoning-festival-2026-tickets-738401183?ref=MC3012" style="font-family: Milker;  color: var(--title);">Buy Tickets</a>
	    </div>
	    <hr>
	    <p class="full" id="partners" style="margin-bottom: -1rem; margin-top: 0">
		<a href="https://www.instagram.com/fortyldn/"><img src="festival/partners/forty.png" alt="Logo for Seasoning Festival 2026 partner - Forty"></a>
		<a href="https://www.dancepolicy.com/"><img src="festival/partners/dance-policy.png" alt="Logo for Seasoning Festival 2026 partner - Dance Policy"></a>
		<a href="https://www.instagram.com/joy__lift/"><img src="festival/partners/joy-lift.png" alt="Logo for Seasoning Festival 2026 partner - Joy Lift"></a>
		<a href="https://www.instagram.com/craniummmmmmm/"><img src="festival/partners/cranium.png" alt="Logo for Seasoning Festival 2026 partner - Cranium"></a>
	    </p>
	    <p class="full" id="partners">
		<a href=""><img src="festival/partners/loose-joints.png" alt="Logo for Seasoning Festival 2026 partner - Loose Joints"></a>
		
		
		<a href="https://www.instagram.com/cabinfeverldn/"><img src="festival/partners/cabin-fever.png" alt="Logo for Seasoning Festival 2026 partner - Cabin Fever"></a>
		<a href="https://www.instagram.com/clubblanco/?hl=en"><img src="festival/partners/club-blanco.png" alt="Logo for Seasoning Festival 2026 partner - Club Blanco"></a>
		<a href="https://www.artscouncil.org.uk/"><img src="festival/partners/arts-council-england.png" alt="Logo for Seasoning Festival 2026 partner - Arts Council England"></a>
		
	    </p>
	    
	</div>
    </body>

    <?php renderFooter() ?>
</html>
<script>
 const seconds = document.getElementById('seconds');
 const minutes = document.getElementById('minutes');
 function incrementMinutes(){
     var original = parseInt(minutes.innerText);
     original -= 1;
     if (original < 0){
	 location.reload();
     } else {
	 minutes.innerText = original;
     }
 }
 function incrementSeconds(){
     var original = parseInt(seconds.innerText);
     original -= 1;
     if (original < 0){
	 original = 59;
         incrementMinutes();
     }
     seconds.innerText = original;
 }
 if (seconds.innerText != ''){
     setInterval(incrementSeconds, 1000);
 } 
</script>
