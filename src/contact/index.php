 <?php
$root = '../';
include '../../lib.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
	<base href="../">
	<?php
	renderSEO('Contact Us', 'https://seasoning.live/contact', 'Email us for bookings or other enquiries.');
	?>
	<link rel="stylesheet" href="style.css?v=<?php echo file_get_contents($root.'css-version.txt'); ?>">
    </head>
    <?php echo $analytics ?>
    <body>
	<?php renderTitle('Contact Us!'); ?>
	<div class="paragraph">
	    <div>
		<div class="footer-links big-links justify-left">
		    <?php
		    $pages = ['Instagram','Facebook','Mixcloud','Resident Advisor'];
		    $links = ['Instagram','Facebook','Mixcloud','Resident Advisor'];
		    renderMenu($pages, $links);
		    ?>
		</div>
		<br>
	    </div>
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
