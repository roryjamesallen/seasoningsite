 <?php
header('Location: https://seasoning.live/404');
exit();
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
	<?php renderTitle('Gallery'); ?>
	<div class="page-width">
	<?php
	foreach (scandir('../images/gallery') as $file){
	    if (str_contains($file, '.jpg')){
		echo '<img class="gallery-image-full-width" src="./images/gallery/'.$file.'">';
	    }
	};	
        ?>
        </div>
	<br>
	<div class="paragraph">
	    <?php renderPhotoCredits(); ?>
	</div>
    </body>

    <?php renderFooter(); ?>
</html>

<script type="module" src="scripts.js"></script>
