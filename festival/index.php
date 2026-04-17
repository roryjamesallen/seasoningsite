<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$root = '../';
include '../lib.php';

$event_id = '20260411';
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
     @font-face {
	 font-family: Cormorant;
	 src: url('fonts/Cormorant.ttf');
     }
     body::before {
	 content: none;
     }
     body {
	 background-color: #f5eee5;
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
     .paragraph {
	 gap: 1rem;
     }
     .paragraph > * {
	 font-family: Cormorant;
	 display: block;
	 color: black;
     }
     h2 {
	 font-size: 3rem;
     }
     hr {
	 background-color: white;
	 flex-basis: 100% !important;
     }

     
     footer * {
	 color: grey !important;
     }
     footer > a {
	 color: black !important;
     }
     .full {
	 flex-basis: 100%;
     }
     .artist-list {
	 font-size: 3rem;
	 margin: 0 0 1rem;
     }
     .artist-list  a {
	 color: black;
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
	<div style="height: 100vh"></div>
	<div class="paragraph" style="margin-top: 3rem">
	    <h2 style="text-align: left; font-family: Milker">Rave Culture Is Folk Culture</h2>
	    <h3 style="text-align: right;">Not a weekend away from life, but a durable scene inside it. Something earthy, bass-led, porous and strange.</h3>
	    <h3 style="align-self: last baseline"></h3>
	    <h2 style="text-align: right; font-family: Milker; align-self: last baseline; margin-bottom: 0">3 Days<br>3 Nights</h2>
	    <img src="festival/moon-phases.png" style="max-height: 500px; object-fit: contain">
	    <h4 style="align-self: start; margin: 0; font-weight: normal; text-align: right"><i>Figure 5: Moon phase circle culminating in the 31 May 2026 blue moon, with dated phases distributed around the orbit and a ray extending inward to Stroud as both site and concept.</i></h4>
	    <hr>
	    <h2 style="font-family: Milker; margin: 0">The Artists</h2>
	    <p class="full artist-list"><?php renderArtistList($event['artists']);?><hr class="full"> <h3 style="font-family: Milker">& Many More To Come</h3></p>
	    <p></p><h3 style="max-width: fit-content"><a href="https://fixr.co/event/seasoning-festival-2026-tickets-738401183?ref=MC3012" style="font-family: Milker; border: 2px solid black; padding: 0.5rem; color: black">Buy Tickets</a></h3><br><br>
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
