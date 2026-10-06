<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['signup'])){
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	$old_emails = json_decode(file_get_contents('../../../merch-emails.json'), true);
	//$old_emails = [];
	if (!isset($old_emails[$_POST['email']])){ // Only submit if not already submitted
	    $old_emails[$_POST['email']] = array('time'=>date('c'), 'ip'=>$_SERVER['REMOTE_ADDR']);
	    file_put_contents('../../../merch-emails.json', json_encode($old_emails));
	}
	header('Location: ?msg=Signed+up!');
    } else {
	header('Location: ?e=Please+enter+a+valid+email+address!');
    }
}

$root = '../../';
include '../../../lib.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
	<base href="../../">
	<?php
	renderSEO('Thanks for your order!', 'https://seasoning.live/clobber/thanks', 'Thanks for your order!');
	?>
	<link rel="stylesheet" href="style.css?v=<?php echo file_get_contents($root.'css-version.txt'); ?>">
     <meta name="robots" content="noindex">
    </head>
    <?php echo $analytics ?>
    <body>
	<?php renderTitle('<span style="display: block; text-align: center">Thanks for your order!</span>'); ?>
        <br><br>
	<div class="paragraph">

	    <form method="POST" class="stock-notification-form show">
		<h2>Sign up to the mailing list!</h2>
		<p class="error"><?php if (isset($_GET['e'])){ echo $_GET['e']; } ?></p>
		<input type="email" name="email" placeholder="you@example.com">
		<input type="submit" value="Sign Up" name="signup">
	    </form>

	</div>
	</div>
	<div style="height: 5rem;"></div>
    </body>

    <?php renderFooter(); ?>
</html>

<script type="module" src="scripts.js"></script>
