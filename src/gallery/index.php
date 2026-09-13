 <?php
$root = '../';
include '../../lib.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
	<base href="../">
	<?php
	renderSEO('Seasoning Gallery', 'https://seasoning.live/gallery', 'See with your own eyes what Seasoning is all about.');
	?>
	<link rel="stylesheet" href="style.css?v=<?php echo file_get_contents($root.'css-version.txt'); ?>">
    </head>
    <?php echo $analytics ?>
    <body>							
	<?php renderTitle('Gallery'); ?>
	<p class="paragraph">
	    See what Seasoning is all about.
	</p>
	<br><br><br>
	<?php
	renderOverlayBreak('primary', 'Goods Shed');
	renderGallery('goods-shed');
	renderOverlayBreak('tertiary', 'Goods Yard');
	renderGallery('goods-yard');
	renderOverlayBreak('primary', 'The Bur');
	renderGallery('the-bur');
	renderOverlayBreak('fourth', 'The Nest');
	renderGallery('the-nest');
	renderOverlayBreak('secondary', 'Talks');
	renderGallery('talks');
	renderOverlayBreak('tertiary', 'Community Build');
	renderGallery('community-build');
	renderOverlayBreak('primary');
	?>
	<br>
    </body>
`
    <?php renderFooter(); ?>
</html>

<script type="module" src="scripts.js"></script>
