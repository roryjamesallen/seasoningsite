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
	<div id="popup">
	    <form method="POST">
		<h2 class="star-container" stars="5" star-size="5">Keep in touch!</h2>
		<p class="error"><?php if (isset($_GET['e'])){ echo $_GET['e']; } ?></p>
		<input type="email" name="email" placeholder="you@example.com">
		<input type="submit" value="Sign Up" name="signup">
		<div id="close-popup">✖</div>
	    </form>
	    
	</div>
	
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
<script>
 const create_popup_cookie = '<?php echo $_SESSION["create_popup_cookie"]; ?>';
 const popup_element = document.getElementById('close-popup');
 popup_element.addEventListener('click', closePopup);

 function setCookie(cname, cvalue, exdays) {
     const d = new Date();
     d.setTime(d.getTime() + (exdays*24*60*60*1000));
     let expires = "expires="+ d.toUTCString();
     document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
 }
 function getCookie(cname) {
     let name = cname + "=";
     let decodedCookie = decodeURIComponent(document.cookie);
     let ca = decodedCookie.split(';');
     for(let i = 0; i <ca.length; i++) {
	 let c = ca[i];
	 while (c.charAt(0) == ' ') {
	     c = c.substring(1);
	 }
	 if (c.indexOf(name) == 0) {
	     return c.substring(name.length, c.length);
	 }
     }
     return true;
 }
 function closePopup(){
     setCookie('popup', 'false', 365);
     popup_element.parentNode.parentNode.style.top = ' -100vh';
 }

 if (create_popup_cookie == 'true' || getCookie('popup') == 'false'){
     closePopup();
 } else {
     popup_element.parentNode.parentNode.style.top = '0px';
 }
</script>
