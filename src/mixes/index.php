<?php
$root = '../';
include '../../lib.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
	<base href="../">
	<?php
	renderSEO('Mixes', 'https://seasoning.live/mixes', 'Relive your favourite Seasoning sets and get a taste of what\'s to come.');
	?>
	<link rel="stylesheet" href="style.css?v=<?php echo file_get_contents($root.'css-version.txt'); ?>">
    </head>
    <?php echo $analytics ?>
    <body>
	<?php renderTitle('Mixes'); ?>
	<div class="paragraph" id="mixes" style="margin: 1rem auto 2rem">
	    <div><h3 style="display: inline; color: var(--pink)"><a href="artist/Om+Unit">Om Unit</a></h3> closes <a href="festival">Seasoning Festival 2026</a> as part of the Spirit takeover, recorded live on Sunday night in Stroud. Our first post-festival contribution to the Seasoning mix series begins where the weekend ended: in the final stretch of a room still moving, still open, still finding new reserves of energy after three days together.</div>
	    
	    <iframe width="100%" height="400" src="https://player-widget.mixcloud.com/widget/iframe/?feed=%2FSeas0ning%2Fseason%25C9%25AAng005-om-unit-l%25C9%25AAve-from-season%25C9%25AAng-fest%25C9%25AAval-2026%2F" frameborder="0" allow="encrypted-media; fullscreen; autoplay; idle-detection; speaker-selection; web-share;" ></iframe>
	    <p style="flex-basis: 100%;">Across the last 90 minutes of his closing set, Om Unit moves with unmistakable emotional fluency through dubstep classics, bleep pressure, contemporary club foundations, unreleased edits and his own idiosyncratic productions. Caspa & Rusko-era nostalgia, Ability II’s “Pressure Dub,” Gaszia’s “Taste,” deep bassweight, breakbeat lift and rave euphoria all pass through the mix with class, warmth and soul.</p>
	    <hr style="flex-basis: 100%;">
	    <iframe width="50%" height="400" src="https://player-widget.mixcloud.com/widget/iframe/?feed=%2Fworldwidefm%2Flove-cuts-lovellious-w-fraser-dahdouh-seasoning-special-08-05-26%2F" frameborder="0" allow="speaker-selection; web-share;"></iframe>
	    <div><h3 style="display: inline; color: var(--pink)">Love Cuts</h3><br>Listen back to the <a href="https://www.instagram.com/l0ve.cuts/">Love Cuts</a> 'Seasoning Special' <a href="https://www.worldwidefm.net/">Worldwide FM</a> broadcast: Fraser and <a href="artist/Lovellious">Lovellious</a> discuss the meaning behind the 'Rave Culture is Folk Culture' slogan ahead of <a href="festival">Seasoning Festival 2026</a> , interspersed with mystic folky funky music.</div>
	</div>
    </body>

    <?php renderFooter(); ?>
</html>

<script type="module" src="scripts.js"></script>