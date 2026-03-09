<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$root = '../';
include '../lib.php';

if (isset($_GET['e'])){
    $event_id = urldecode($_GET['e']);
    try {
	$event = getEventFromId($event_id);
    } catch (Exception $e) {
	header('Location: ../');
    }
} else {
    header('Location: ../');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
	<base href="../">
	<?php renderSEO(date("d.m.Y",strtotime($event['date'])).' @ '.$event['venue'].', '.$event['city']); ?>
	<link rel="stylesheet" href="style.css?v=39">
    </head>
    <?php echo $analytics ?>
    
    <body>
	<?php renderTitle(date("d.m.Y",strtotime($event['date'])).' @ '.$event['venue'].', '.$event['city']); ?>
	<?php renderEventDetails($event); ?>
    </body>

    <?php renderFooter() ?>
</html>
