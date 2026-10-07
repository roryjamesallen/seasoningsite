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
	<?php renderTitle('FAQs'); ?>
        
	<div class="secondary-background">
	    <?php
	    renderPageBreak(1, 'primary');
	    ?>

	    <h2>
	    Seasoning Festival
	</h2>
	<br>
	<div class="paragraph faq-container">

	    <h3>When?</h3>
	    <p>27th - 30th May 2027</p>
	    <h3>Where?</h3>
	    <p><a href="https://www.openstreetmap.org/node/21369320#map=13/51.74481/-2.21821">Stroud.</a></p>
	    <h3>Camping</h3>
	    <p>
		Camping is included with your entry ticket.<br>
		Exact location released at a later date.<br>
		Live in vehicle passes released at a later date.
	    </p>
	    <h3>Tickets</h3>
	    <p>
		Your ticket will be sent via your ticketing platform.<br>
		Tickets are non-refundable.<br>
		A small selection of day tickets released at a later date.
	    </p>
	    <h3>Accreditation</h3>
	    <p>
		Accreditation will be open 12:00 - 22:00 each day.<br>
		After 22:00, there will be no first time entries.
	    </p>
	    <h3>Water Points</h3>
	    <p>Water available at all of our bars and campsite.</p>
	    <h3>Food</h3>
	    <p>
		We have multiple food vendors on site.<br>
		A small selection of discounted local spots released at a later date.
	    </p>
	    <h3>Alcohol</h3>
	    <p>
		You may bring alcohol to our campsite but not into our venues.<br>
		All our venues have their own bar.
	    </p>
	    <h3>Accessibility</h3>
	    <p>
		Most of our venues are wheelchair accessible.<br>
		We offer companion tickets.<br>
		For more information email India@seasoning.live.<br>
	    </p>
	    <h3>Leave No Trace</h3>
	    <p>
		Look after our home.<br>
		Use the bins, recycle where you can.<br>
		Stub and bin your cigs.<br>
		Take everything home.
	    </p>
	    <h3>Get Involved</h3>
	    <p>For work / volunteering / vendors / PR and more, introduce yourself at India@seasoning.live</p>
	    <h3>WhatsApp Community</h3>
	    <p>
		For more information and regular updates, join our WhatsApp Community <a href="https://chat.whatsapp.com/EILf1gofVFmHHWf35QEoXB">here</a>
	    </p>
	</div>
	</div>
	<?php renderPageBreak(2, 'secondary'); ?>
    </body>

    <?php renderFooter(); ?>
</html>

<script type="module" src="scripts.js"></script>
