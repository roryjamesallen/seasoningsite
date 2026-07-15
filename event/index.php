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

    if ($event_id == '20260529'){
        header('Location: ../festival');
    }
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
    if (isset($event['name'])){
        $title = $event['name'];
    } else if (isset($event['artists'])){
        if (count($event['artists']) == 1){
            $artist_text = $event['artists'][0];
        } else if (count($event['artists']) == 2){
            $artist_text = $event['artists'][0].' & '.$event['artists'][1];
        } else {
            $artist_text = $event['artists'][0].', '.$event['artists'][1].' & More';
        }
        $title = $artist_text.' at '.$event['venue'].', '.$event['city'].' - '.date("d.m.Y",strtotime($event['date']));
    }
renderSEO($title);
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
