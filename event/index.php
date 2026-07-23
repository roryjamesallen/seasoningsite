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
    } catch (Exception $e) { // Page doesn't exist
        header('Location: ../');
    }
    /*
    $REDIRECTS = array(
        '20260529'=>'../festival',
        '20260723'=>'outlook-origins-2026'
    );
    if (in_array($event_id, array_keys($REDIRECTS))){
        header('Location: '.$REDIRECTS[$event_id]);
        }*/
} else {
    header("HTTP/1.1 301 Moved Permanently");
    header('Location: ../');
}
?>
<!DOCTYPE html>
<?php startup();?>
<html lang="en">
    <head>
	<base href="../">
<?php
renderSEO(generateEventTitle($event));
renderEventSchema($event);
?>
	<link rel="stylesheet" href="style.css?v=39">
    <link rel="stylesheet" href="style.css?v=<?php echo file_get_contents($root.'css-version.txt'); ?>">
    </head>
    <?php echo $analytics ?>
    
    <body>
	<?php
	if (isset($event['name'])){
            renderTitle($event['name']);
	} else {
            renderTitle(date("d.m.Y",strtotime($event['date'])).' @ '.$event['venue'].', '.$event['city']);
	}
	?>
	<?php renderEventDetails($event); ?>
    </body>

    <?php renderFooter() ?>
</html>

<script type="module" src="scripts.js"></script>
