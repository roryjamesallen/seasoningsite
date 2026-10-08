<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set("Europe/London");
@session_start();
if (!isset($_SESSION['create_popup_cookie'])){
$_SESSION['create_popup_cookie'] = 'false';
}

include '../lib.php';
?>
<!DOCTYPE html>
<?php startup();?>
<html lang="en">
    <head>
	<?php
	renderSEO();
	renderOrganisationSchema();
	?>
	<link rel="stylesheet" href="style.css?v=<?php cssVersion(); ?>">
    </head>
    <?php echo $analytics ?>
    
    <body>
	<?php renderTitle('<img src="images/icons/rave-culture-is-folk-culture.svg" class="rave-culture-icon">');?>

	<div href="event/festival-2027" class="no-underline banner-content">
        <video width="1920" height="1080" class="banner-image" preload="auto" muted autoplay playsinline loop>
            <source src="images/loop.mp4" type="video/mp4">
        </video>
	    <?php renderPageBreak(1, 'primary'); ?>
	    <h2 class="centred"></h2>
	    <?php renderPageBreak(2, 'primary', true); ?>
	</div>
<br>
<?php startMailingListForm($_POST);
        renderMailingListForm($_GET); ?>
	
    </body>
    
    <?php renderFooter() ?>
</html>

<script type="module" src="scripts.js"></script>
