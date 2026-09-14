 <?php
$root = '../';
include '../../lib.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
	<base href="../">
	<?php
	renderSEO('Frequently Asked Questions', 'https://seasoning.live/faq', 'Find out what you\'ve always wondered...');
	?>
	<link rel="stylesheet" href="style.css?v=<?php echo file_get_contents($root.'css-version.txt'); ?>">
    </head>
    <?php echo $analytics ?>
    <body>
	<?php renderTitle('FAQs!'); ?>
	<h2>
	    Seasoning Festival
	</h2>
	<br>
	<div class="paragraph faq-container">
	    <h3>When is the next festival?</h3>
	    <p>27th - 30th May 2027</p>
	    <h3>Where is it?</h3>
	    <p>Seasoning Festival takes place across the beautiful Stroud, in the heart of the Cotswolds, GL5 3AP.</p>
	    <h3>How do I get there?</h3>
	    <p>
		<strong>• By Car</strong><br>
		If you’re coming by car, you’ll need to purchase a car parking pass. 
		There is not a great deal of space and we’re keen to reduce our carbon footprint, so book early and car share.<br>
		<strong>• By Train</strong><br>
		If you’re coming by train, our venues are located a stones throw from Stroud Train Station. 
		You can hop on a bus to the campsite.<br>
		<strong>• By Bus</strong><br>
		There are many bus stops coming from Bristol, Cheltenham, Gloucester etc all across Stroud. Find the service for you here.<br>
		<strong>• By Taxi</strong><br>
		There is a taxi rank outside, a list of taxi services here. 
		Stroud also has Uber.
	    </p>
	    <h3>Can I camp?</h3>
	    <p>Camping is included with your entry ticket, you need to bring your own camping equipment. We ask that everyone leaves site by 12pm on Tuesday 1st June. There are no showers on site.<br>
		<strong>Camper Vans</strong><br>
		You can bring your camper van if you purchase a Camper Van Pass. 
		Non-live-in vans are not permitted in the campsite.
	    </p>
	    <h3>Can I bring my pet?</h3>
	    <p>
		Animals are not allowed on the festival site, with the exception of service animals.
	    </p>
	</div>
	<div class="secondary-background">
	    <?php
	    renderPageBreak(1, 'primary');
	    ?>
	    <div class="paragraph paragraph-with-titles centred">
		<div>
		    <h3>Bookings</h3>
		    <p>Please email bookings@seasoning.live for enquiries relating to booking an artist.</p>
		</div>
		<div>
		    <h3>Production</h3>
		    <p>Or email production@seasoning.live for anything relating to other Seasoning goings on!</p>
		</div>
	    </div>
	</div>
	<?php renderPageBreak(2, 'secondary'); ?>
    </body>

    <?php renderFooter(); ?>
</html>

<script type="module" src="scripts.js"></script>
