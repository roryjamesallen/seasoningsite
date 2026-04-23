<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$root = '../';
include '../lib.php';

$event_id = '20260529';
$event = getEventFromId($event_id);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
	<base href="../">
	<?php renderSEO('Seasoning Festival 2026 - Rave Culture Is Folk Culture', 'https://seasoning.live/festival'); ?>
	<link rel="stylesheet" href="style.css?v=<?php echo file_get_contents($root.'css-version.txt'); ?>">
	<link rel="stylesheet" href="festival/festival-style.css?v=2">
    </head>
    <?php echo $analytics ?>

    <body>
	<img id="grass" src="festival/grass.png" alt="Stone circle in a grassy field">
	<img src="festival/seasoning-festival-logo.svg" id="festival-logo" alt="Logo for Seasoning Festival 2026">
	<h1 style="display: none">Seasoning Festival 2026 - Rave Culture Is Folk Culture</h1>
	<div style="height: 100vh"></div>
	<div class="paragraph" style="margin-top: 3rem; gap: 2rem">
	    <h2 style="text-align: left; font-family: Milker; font-size: 3rem;"><span style="color: var(--extra)"><span style="font-size: 4rem">Rave</span> Culture</span> <span style="color: var(--paragraph)"><br>Is <span style="font-size: 4rem">Folk</span> Culture</span></h2>
	    <p style="text-align: right; font-size: 2rem; margin: 0">Not a weekend away from life, but a durable scene inside it. Something earthy, bass-led, porous and <strong>strange.</strong></p>
	    <p style="font-size: 2rem; margin: 0">At The Goods Shed + SVA<br>Stroud, GL5 3AP</p><h2 style="text-align: right; font-family: Milker; align-self: last baseline; margin-bottom: 0; color: var(--paragraph)"><span style="font-size: 6rem; margin-right: -0.75rem; color: var(--extra); display: inline-block; margin-bottom: -0.5rem">3</span> Days<br><span style="font-size: 5rem; margin-right: -0.75rem; margin-top: -0.35rem; display: inline-block; color: var(--extra)">3</span> <span style="vertical-align: top">Nights</span></h2>
	    <!--<h2 style="font-family: Milker; margin: 0; text-align: center; background-color: var(--extra); padding: 2rem; color: white; font-size: 2rem" class="full">A Weekend of <strong style="font-size: 3rem">Soundsystem Mysticism</strong> in The Five Valleys</h2>-->

	    <p style="font-size: 2rem; margin: 0" class="full">Bringing together strands of rave that have long run parallel, low-end pressure, percussive intensity, dubwise psychedelia, hypnotic techno and everything in between.</p>
	    
	    <h2 style="font-family: Milker; margin: 0; font-size: 2rem; display: flex; flex-direction: column; gap: 1rem; align-self: end">
		<span>Over <span style="font-size: 5rem; color: var(--title)">130</span><span style="font-size: 3rem">artists</span></span>
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
	    <p style="font-family: Milker; align-self: center; font-size: 2rem; margin: 0">& Many More To Come</p>
	    <div style="border: 2px solid var(--title); padding: 0.5rem; max-width: fit-content; margin: 0 auto">
		<a href="https://fixr.co/event/seasoning-festival-2026-tickets-738401183?ref=MC3012" style="font-family: Milker;  color: var(--title)">Buy Tickets</a>
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
 const svgtext = document.getElementById('circle-text-text');
const wait = 2000;
 
 function setZero(){
     svgtext.setAttribute('startOffset', '5%');
     setTimeout(() => {
	 setHundred();
     }, wait);
     
 }
 function setHundred(){
     svgtext.setAttribute('startOffset', '0%');
     setTimeout(() => {
	 setZero();
     }, wait);
 }

 //setHundred();
 
</script>
