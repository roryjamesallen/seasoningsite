<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('UTC');

$root = '../../';
include '../../lib.php';

$date_now = new DateTime('now');

$debug = true;
if ($debug){
    $debug_interval = DateInterval::createFromDateString('12 days 11 hours 37 minutes 40 seconds');
    $date_now = date_add($date_now, $debug_interval);
}

$time_now_formatted = $date_now->format('l H:i');
$seconds = $date_now->format('s');

function timeUntilAct($act_time, $other_act_on){
    global $date_now;
    $act_time_date = new DateTime($act_time);
    $act_time_formatted = date_format($act_time_date, 'H:i');
    //echo $act_time_date->format('H:i').' vs '.$date_now->format('H:i').'<br>'.date_diff($act_time_date, $date_now)->format('%H:%i');
    if ($act_time_date < $date_now){ // This act has already started
        if ($other_act_on){ // Another event is on already so this event must have also already ended
            return [false, '<span class="act-past">'.$act_time_formatted.'</span>'];
        } else { // This act is on
            return [true, '<span class="act-now">NOW</span>'];
        }
    } else {
        return [false, $act_time_formatted];
    }
}

function renderAct($time, $act, $other_act_on){
    $this_act_on = false;
    echo '<div class="act"><span class="act-artists">';
    if (isset($act['artists'])){
        echo implode(', ', $act['artists']);
    }
    if (isset($act['note'])){
        echo '<br><span class="act-note">'.$act['note'].'</span>';
    }
    echo '</span>';
    $act_details = timeUntilAct($time, $other_act_on);
    echo '<span class="act-time">'.$act_details[1].'</span>';
    $this_act_on = $act_details[0]; // Whether this act is on or not
    echo '</div>';
    return $this_act_on;
}

function renderTimetable(){
    $timetable = json_decode(file_get_contents('timetable.json'), true);
    echo '<div class="venue-list">';
    foreach ($timetable as $venue => $times){
        $other_act_on = false;
        $venue_class = strtolower(str_replace(' ','-',$venue));
        echo "<div class='venue {$venue_class}'><h2 class='venue-title'>{$venue}</h2><div class='act-list'>";
        krsort($times);
        foreach ($times as $time => $act){
            $this_act_on = renderAct($time, $act, $other_act_on);
            if ($this_act_on == true){
                $other_act_on = true;
            }
        }
        echo '</div></div>';
    }
    echo '</div>';
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
	<!-- <base href="https://seasoning.live">-->
	<base href="../../">
	<?php renderSEO('Seasoning Festival 2026 - Rave Culture Is Folk Culture', 'https://seasoning.live/festival', 'festival/favicon'); ?>
	<link rel="stylesheet" href="style.css?v=<?php echo file_get_contents($root.'css-version.txt'); ?>">
	<link rel="stylesheet" href="festival/festival-style.css?v=5">
    <link rel="stylesheet" href="festival/timetable/timetable-style.css?v=1">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    </head>
    <?php echo $analytics ?>

    <body>
	<img src="festival/blue-circle-background.svg" style="position: absolute; top: 0; left: 0; width: 100%; z-index: -1" alt="Blue circles background image">
	<h1>FESTIVAL TIMETABLE</h1>
    <hr><br><h2>It is <?php echo $time_now_formatted;?> <span id='seconds'><?php echo $seconds; ?></span></h2><br>
	<div>
	    <?php renderTimetable();?>
	</div>
    </body>
</html>

<script>
 var seconds = <?php echo $seconds; ?>;
 const seconds_element = document.getElementById('seconds');
 function incrementSeconds(){
     seconds += 1;
     if (seconds >= 60){
	 window.location.reload();
     } else {
	 seconds_element.innerText = String(seconds).padStart(2, '0');
     }
 }
 setInterval(incrementSeconds, 1000);
 
 setTimeout(() => {
     //window.location.reload();
 }, 1000);
</script>
