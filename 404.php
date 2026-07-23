<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'lib.php';
?>
<!DOCTYPE html>
<?php startup();?>
<html lang="en">
    <head>
	<?php
	renderSEO();
	?>
	<link rel="stylesheet" href="style.css?v=<?php cssVersion(); ?>">
	<style>
	 h2, h3 {
	     text-align: center;
	 }
	 .fixr-link {
	     margin: 2rem auto;
	     font-size: 2rem;
	 }
	</style>
    </head>
    <?php echo $analytics ?>
    <body>
	<?php renderTitle('Error 404!');?>
	<h3>Sorry, this page doesn't exist :(</h3>
	<a class="fixr-link" href="https://seasoning.live">Go Home</a>
    </body>
</html>
<script type="module" src="scripts.js"></script>
