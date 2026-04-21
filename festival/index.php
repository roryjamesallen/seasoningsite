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
    </head>
    <?php echo $analytics ?>

    <style>
     :root {
	 --beige: #f5eee5;
	 
	 --title: #1B1C0C;
	 --paragraph: #F7D5E5;
	 --paragraph: white;
	 --title: rgb(226,152,173);
	 --background: rgb(10,19,13);
	 --extra: #007EA6;
	 --extra: #209EC6;
	 --extra: rgb(226,152,173);
	 --grey: #888888;
     }
     @font-face {
	 font-family: Cormorant;
	 src: url('fonts/Cormorant.ttf');
     }
     body::before {
	 content: none;
     }
     body {
	 background-color: var(--background);
     }
     #grass {
	 height: 100vh;
	 width: 100vw;
	 overflow: hidden;
	 object-fit: cover;
	 position: absolute;
	 left: 50%;
	 top: 50%;
	 transform: translate(-50%, -50%);
	 filter: brightness(0.5);
     }

     #circlePath, #circle-text {
	 display: none;
     }
     #circle-text {
	 position: absolute;
	 left: 50%;
	 top: 50%;
	 transform: translate(-50%, -50%);
	 font-family: Milker;
	 font-size: min(1.4vw, 0.8rem);
	 letter-spacing: 0.05rem;
	 width: 550px;
     }
     #circle-text > * {
	 width: 100%;
     }

     #festival-logo {
	 position: absolute;
	 left: 50%;
	 top: 50%;
	 transform: translate(-50%, -50%);
	 width: 90%;
     }
     
     .paragraph {
	 gap: 1rem;
     }
     .paragraph > * {
	 font-family: Cormorant;
	 display: block;
	 color: var(--paragraph);
     }
     .paragraph > *:empty:not(hr){
	 max-height: 0;
	 overflow: hidden;
     }
     h1, h2 {
	 color: var(--title);
     }
	 
     h2 {
	 font-size: 3rem;
     }
     hr {
	 background-color: white;
	 flex-basis: 100% !important;
     }

     #partners {
	 display: flex;
	 justify-content: space-between;
	 max-width: 100%;
	 gap: 1rem;
     }
     #partners > a {
	 flex-basis: 0;
	 flex-grow: 1;
	 width: 0;
	 max-width: fit-content;
	 object-fit: contain;
	 max-height: 35px;
	 filter: invert(1);
     }
     #partners > a > img {
	 max-height: 100%;
	 max-width: 100%;
     }
     
     footer * {
	 color: var(--grey) !important;
     }
     footer > a {
	 color: var(--title) !important;
     }
     .full {
	 flex-basis: 100%;
     }
     .artist-list {
	 font-size: 2rem;
	 margin: 0 0 1rem;
	 display: flex;
	 flex-wrap: wrap;
	 justify-content: space-between;
     }
     .artist-list a {
	 color: var(--extra);
     }
     .artist-list > div {
	 width: fit-content;
	 max-width: 50%;
     }
     .artist-list > div:nth-child(even){
	 text-align: right;
     }
     .artist-list a:nth-child(even){
	 text-align: right;
     }
    </style>
    
    <body>
	<img id="grass" src="festival/grass.png">
	<svg id="circle-text"
  viewBox="0 0 100 100"
  xmlns="http://www.w3.org/2000/svg"
>
  <path
    id="circlePath"
    d="
      M 10, 50
      a 40,40 0 1,1 80,0
      40,40 0 1,1 -80,0
	"
      fill="transparent"
  />
  <text>
      <textPath id="circle-text-text" href="#circlePath" style="fill: white; baseline-shift: sub;" startOffset="0">
	  SEASONING FESTIVAL 2026
      </textPath>
  </text>
	</svg>
	<img src="festival/seasoning-festival-logo.svg" id="festival-logo">
	<h1 style="display: none">Seasoning Festival 2026</h1>
	<div style="height: 100vh"></div>
	<div class="paragraph" style="margin-top: 3rem; gap: 2rem">
	    <h2 style="text-align: left; font-family: Milker; font-size: 3rem;"><span style="color: var(--extra)"><span style="font-size: 4rem">Rave</span> Culture</span> <span style="color: var(--paragraph)"><br>Is <span style="font-size: 4rem">Folk</span> Culture</span></h2>
	    <h3 style="text-align: right;">Not a weekend away from life, but a durable scene inside it. Something earthy, bass-led, porous and <strong>strange.</strong></h3>
	    <h3>At The Goods Shed + SVA<br>Stroud, GL5 3AP</h3><h2 style="text-align: right; font-family: Milker; align-self: last baseline; margin-bottom: 0; color: var(--paragraph)"><span style="font-size: 6rem; margin-right: -0.75rem; color: var(--extra); display: inline-block; margin-bottom: -0.5rem">3</span> Days<br><span style="font-size: 5rem; margin-right: -0.75rem; margin-top: -0.35rem; display: inline-block; color: var(--extra)">3</span> <span style="vertical-align: top">Nights</span></h2>
	    <!--<h2 style="font-family: Milker; margin: 0; text-align: center; background-color: var(--extra); padding: 2rem; color: white; font-size: 2rem" class="full">A Weekend of <strong style="font-size: 3rem">Soundsystem Mysticism</strong> in The Five Valleys</h2>-->

	    <h3 style="" class="full">Bringing together strands of rave that have long run parallel, low-end pressure, percussive intensity, dubwise psychedelia, hypnotic techno and everything in between.</h3>
	    
	    <h2 style="font-family: Milker; margin: 0; font-size: 2rem; display: flex; flex-direction: column; gap: 1rem; align-self: end">
		<span>Over <span style="font-size: 5rem; color: var(--extra)">130</span><span style="font-size: 3rem">artists</span></span>
		<span style="display: flex; align-items: end; gap: 0.5rem; justify-content: end"><span>moving<br>across</span><span style="font-size: 5rem; color: var(--extra); margin-bottom: -0.7rem">4</span><span>stages</span></span>
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
	    <h3 style="font-family: Milker; align-self: center">& Many More To Come</h3>
	    <h3 style="max-width: fit-content">
		<a href="https://fixr.co/event/seasoning-festival-2026-tickets-738401183?ref=MC3012" style="font-family: Milker; border: 2px solid var(--title); padding: 0.5rem; color: var(--title)">Buy Tickets</a>
	    </h3>
	    <hr>
	    <p class="full" id="partners" style="margin-bottom: -1rem; margin-top: 0">
		<a href="https://www.instagram.com/fortyldn/"><img src="festival/partners/forty.png"></a>
		<a href="https://www.dancepolicy.com/"><img src="festival/partners/dance-policy.png"></a>
		<a href="https://www.instagram.com/joy__lift/"><img src="festival/partners/joy-lift.png"></a>
		<a href="https://www.instagram.com/craniummmmmmm/"><img src="festival/partners/cranium.png"></a>
	    </p>
	    <p class="full" id="partners">
		<a href=""><img src="festival/partners/loose-joints.png"></a>
		
		
		<a href="https://www.instagram.com/cabinfeverldn/"><img src="festival/partners/cabin-fever.png"></a>
		<a href="https://www.instagram.com/clubblanco/?hl=en"><img src="festival/partners/club-blanco.png"></a>
		<a href="https://www.artscouncil.org.uk/"><img src="festival/partners/arts-council-england.png"></a>
		
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
