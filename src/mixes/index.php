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

	<?php renderOverlayBreak('secondary', 'Om Unit', 'break-padding'); ?>
	<div class="paragraph">
	    <div><h3 style="display: inline; color: var(--pink)">Om Unit</h3> closes <a href="event/festival-2026">Seasoning Festival 2026</a> as part of the Spirit takeover, recorded live on Sunday night in Stroud. Our first post-festival contribution to the Seasoning mix series begins where the weekend ended: in the final stretch of a room still moving, still open, still finding new reserves of energy after three days together.</div>
	    <iframe width="100%" height="400" src="https://player-widget.mixcloud.com/widget/iframe/?feed=%2FSeas0ning%2Fseason%25C9%25AAng005-om-unit-l%25C9%25AAve-from-season%25C9%25AAng-fest%25C9%25AAval-2026%2F" frameborder="0" allow="encrypted-media; fullscreen; autoplay; idle-detection; speaker-selection; web-share;" ></iframe>
	    <p style="flex-basis: 100%;">Across the last 90 minutes of his closing set, Om Unit moves with unmistakable emotional fluency through dubstep classics, bleep pressure, contemporary club foundations, unreleased edits and his own idiosyncratic productions. Caspa & Rusko-era nostalgia, Ability II’s “Pressure Dub,” Gaszia’s “Taste,” deep bassweight, breakbeat lift and rave euphoria all pass through the mix with class, warmth and soul.</p>
	</div>

	<?php renderOverlayBreak('tertiary', 'Tania Atyabi', 'break-padding'); ?>
	
	<div class="paragraph">
	    <div><h3 style="display: inline; color: var(--pink)">Tania Atyabi</h3> enters the mix series with a tour de force in dubby, halftime rhythms, swinging off-kilter and occupying that psychedelic texture that keeps us up at night.<br>This one moves like pressure under stone. Broken pulses, submerged dubs, percussive ghosts and low-lit mutations, folding experimental club music into something slower, stranger and more physically charged.</div><iframe width="50%" height="400" src="https://player-widget.mixcloud.com/widget/iframe/?feed=%2FSeas0ning%2Fseason%25C9%25AAng005-tania-atyabi-i%2F&utm_medium=share&utm_source=embed&utm_content=show&utm_term=MWYxNDhjM2VfY2RkOV80YmI1X2FhNGZfNmVlNGIyZGE0YTc5" frameborder="0" allow="encrypted-media; fullscreen; autoplay; idle-detection; speaker-selection; web-share;" ></iframe>
	    <p style="flex-basis: 100%">"This mix moves in waves - starts with intense halftime cuts full of complex, twisted drum patterns before easing into softer, dubby rhythms.. it then gradually builds into more energetic, dancefloor suited territory that eventually ends somewhere between jungle and dubstep. It’s a reflection of how I’ve been feeling and perceiving the world lately - lots of unpredictable shifts, highs and lows, and tryna ride the wave as it all unfolds.."</p>
	</div>

	<?php renderOverlayBreak('fifth', 'Love Cuts', 'break-padding'); ?>

	<div class="paragraph">
	    <div><h3 style="display: inline; color: var(--pink)">Love Cuts</h3><br>Listen back to the <a href="https://www.instagram.com/l0ve.cuts/">Love Cuts</a> 'Seasoning Special' <a href="https://www.worldwidefm.net/">Worldwide FM</a> broadcast: Fraser and Lovellious discuss the meaning behind the 'Rave Culture is Folk Culture' slogan ahead of <a href="festival">Seasoning Festival 2026</a> , interspersed with mystic folky funky music.</div><iframe width="50%" height="400" src="https://player-widget.mixcloud.com/widget/iframe/?feed=%2Fworldwidefm%2Flove-cuts-lovellious-w-fraser-dahdouh-seasoning-special-08-05-26%2F" frameborder="0" allow="speaker-selection; web-share;"></iframe>
	</div>
	<br>

	<?php renderOverlayBreak('fourth', 'Severine', 'break-padding'); ?>

	<div class="paragraph">
	    <div><h3 style="display: inline; color: var(--pink)">Severine's</h3> sound places familiar rhythms in uncanny and disorienting spaces - nostalgia gives way to dislocation as sets move through different paces. Each destination transitory, the fluid approach to genre courses through the breadth of their sound, where the melodic sheen of 90s club rounds into the organic warmth of amphibious electro. .</div>
	    <iframe width="50%" height="400" src="https://player-widget.mixcloud.com/widget/iframe/?feed=%2FSeas0ning%2Fseason%25C9%25AAng003-severine%2F&utm_medium=share&utm_source=embed&utm_content=show&utm_term=MWYxNDhjM2VfY2RkOV80YmI1X2FhNGZfNmVlNGIyZGE0YTc5" frameborder="0" allow="encrypted-media; fullscreen; autoplay; idle-detection; speaker-selection; web-share;" ></iframe>
	    <p style="flex-basis: 100%">The line between the corporeal and machinic dissipates gently as your coaxed through the depths of off kilter techno. This connects with that old energy animating UK club music - the hardcore continuum, still vibrating with the unrealised futures of those halcyon dancefloors. Not revivalism, but a live current.</p>
	</div>
    </body>

    <?php renderFooter(); ?>
</html>

<script type="module" src="scripts.js"></script>
