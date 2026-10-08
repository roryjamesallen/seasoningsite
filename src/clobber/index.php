<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$root = '../';
include '../../lib.php';

startMailingListForm($_POST);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
	<base href="../">
	<?php
	renderSEO('Clobber', 'https://seasoning.live/clobber', 'Wear Rave Culture is Folk Culture on your chest.');
	?>
	<link rel="stylesheet" href="style.css?v=<?php echo file_get_contents($root.'css-version.txt'); ?>">
	<script 
	    src="https://www.paypal.com/sdk/js?client-id=BAAG1rDK9Lt0FDRPXSliNfUOupFjPni_QLvsxRsMwm8ziJJfzR2zZcuj2b41S6kfTPRZlTy5OMKfsSdXic&components=hosted-buttons&disable-funding=venmo&currency=GBP">
	</script>
    </head>
    <?php echo $analytics ?>
    <body>
	<?php renderTitle('Clobber'); ?>
	<div class="paragraph">

	    <div id="paypal-container-KJE3R63X4RYD8" class="paypal"></div>
	    <script>
	     paypal.HostedButtons({
		 hostedButtonId: "KJE3R63X4RYD8",
	     }).render("#paypal-container-KJE3R63X4RYD8")
	    </script>
        
<?php
renderMailingListForm($_GET);
?>

	</div>
	</div>
	<div style="height: 5rem;"></div>
    </body>

    <?php renderFooter(); ?>
</html>

<script type="module" src="scripts.js"></script>

<script>
 const hero = ['01','02'];
 let started = false;
 function tim(){
     const hero_images = document.getElementsByClassName('hero-img');
     if (hero_images.length != 0){
	 started = true;
	 check();
     } else {
	 setTimeout(tim, 100);
	 console.log('timming');
     }
 }
 function check(){
     const hero_images = document.getElementsByClassName('hero-img');
     let wait = false;
     let current_img = 0;
     for (hero_image of hero_images){
	 if (hero_image == null){
	     wait = true;	     
	 } else {
	     if (!hero_image.classList.contains('changed')){
		 hero_image.src = 'images/clobber/SEASONING-TEE-01_' + hero[current_img] + '.jpg';
		 hero_image.classList.add('changed');
	     }
	 }
	 ++current_img;
     }
     if (wait){
	 setTimeout(check, 100);
	 console.log('waiting');
     }
 }
 
 window.addEventListener('load', function(){
     //tim();
 });
</script>
