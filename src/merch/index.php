<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['signup'])){
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
//$old_emails = json_decode(file_get_contents('../../merch-emails.json'), true);
        //$old_emails = [];
        if (!isset($old_emails[$_POST['email']])){ // Only submit if not already submitted
            $old_emails[$_POST['email']] = array('time'=>date('c'), 'ip'=>$_SERVER['REMOTE_ADDR']);
            file_put_contents('../../emails.json', json_encode($old_emails));
        }
        $_SESSION['create_popup_cookie'] = 'true';
        header('Location: ?msg=Signed+up!');
    } else {
        header('Location: ?e=Please+enter+a+valid+email+address!');
    }
}

$root = '../';
include '../../lib.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
	<base href="../">
	<?php
	renderSEO('Seasoning Merch', 'https://seasoning.live/merch', 'Wear Rave Culture is Folk Culture on your chest.');
	?>
	<link rel="stylesheet" href="style.css?v=<?php echo file_get_contents($root.'css-version.txt'); ?>">
	<script 
  src="https://www.paypal.com/sdk/js?client-id=BAAG1rDK9Lt0FDRPXSliNfUOupFjPni_QLvsxRsMwm8ziJJfzR2zZcuj2b41S6kfTPRZlTy5OMKfsSdXic&components=hosted-buttons&disable-funding=venmo&currency=GBP">
</script>
    </head>
    <?php echo $analytics ?>
    <body>
	<?php renderTitle('Merch'); ?>
	<div class="paragraph">
	    
<div id="paypal-container-KJE3R63X4RYD8" class="paypal"></div>
<script>
  paypal.HostedButtons({
    hostedButtonId: "KJE3R63X4RYD8",
  }).render("#paypal-container-KJE3R63X4RYD8")
</script>
<form method="POST" class="stock-notification-form">
		<h2 class="star-container" stars="5" star-size="5">Get notified when we get new stock!</h2>
		<p class="error"><?php if (isset($_GET['e'])){ echo $_GET['e']; } ?></p>
		<input type="email" name="email" placeholder="you@example.com">
		<input type="submit" value="Sign Up" name="signup">
	    </form>
	</div>
    </body>

    <?php renderFooter(); ?>
</html>

<script type="module" src="scripts.js"></script>
