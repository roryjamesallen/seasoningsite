 <?php
$root = '../';
include '../../lib.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
	<base href="../">
	<?php
	renderSEO('Gallery', 'https://seasoning.live/gallery', 'See with your own eyes what Seasoning is all about.');
	?>
	<link rel="stylesheet" href="style.css?v=<?php echo file_get_contents($root.'css-version.txt'); ?>">
    </head>
    <?php echo $analytics ?>
    <body>							
	<?php renderTitle(''); ?>
	<br><br><br>
	<?php
	renderOverlayBreak('primary', 'Goods Shed');
	renderGallery('goods-shed');
	renderOverlayBreak('tertiary', 'Goods Yard');
	renderGallery('goods-yard');
	renderOverlayBreak('fourth', 'The Bur');
	renderGallery('the-bur');
	renderOverlayBreak('primary', 'The Nest');
	renderGallery('the-nest');
	renderOverlayBreak('secondary', 'Loganberry');
	renderGallery('loganberry');
	renderOverlayBreak('tertiary', 'Community Build');
	renderGallery('community-build');
	renderOverlayBreak('primary');
	?>
	<br>
	<div class="paragraph">
	    <?php renderPhotoCredits(); ?>
	</div>
    </body>

    <?php renderFooter(); ?>
</html>

<script type="module" src="scripts.js"></script>
