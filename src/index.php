<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set("Europe/London");
@session_start();
if (!isset($_SESSION['create_popup_cookie'])){
$_SESSION['create_popup_cookie'] = 'false';
}
if (isset($_POST['signup'])){
if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
$old_emails = json_decode(file_get_contents('../emails.json'), true);
//$old_emails = [];
if (!isset($old_emails[$_POST['email']])){ // Only submit if not already submitted
$old_emails[$_POST['email']] = array('time'=>date('c'), 'ip'=>$_SERVER['REMOTE_ADDR']);
file_put_contents('../emails.json', json_encode($old_emails));
}
$_SESSION['create_popup_cookie'] = 'true';
header('Location: ?msg=Signed+up!');
} else {
header('Location: ?e=Please+enter+a+valid+email+address!');
}
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
	<?php renderTitle('Rave Culture is<br>Folk Culture');?>

	<a href="event/festival-2027" class="no-underline banner-content">
	    <img src="images/gallery/goods-yard/Seasoning-Festival-2026-The-Goods-Yard-03-@samuelwilsonphotography.jpg" class="banner-image">
	    <?php renderPageBreak(1, 'primary'); ?>
	    <h2 class="centred">Seasoning Festival 2027</h2>
	    <?php renderPageBreak(2, 'primary', true); ?>
	</a>
	
    </body>
    
    <?php renderFooter() ?>
</html>

<script type="module" src="scripts.js"></script>
