<!DOCTYPE html>
<html>
    <body>
	<h1>Issues</h1>
	<?php
	$issues = [];
	
	$events_json = json_decode(file_get_contents('../events.json'), true);
	foreach ($events_json as $id => $event){
	    foreach (['name','date','venue','city','description','artists','image','permalink'] as $key){
		if (!isset($event[$key])){
		    $issues['No '.ucfirst($key)][] = $id;
		}
	    }
	}
	
	foreach ($issues as $issue => $event_ids){
	    echo '<h2>'.$issue.'</h2><ul>';
	    foreach ($event_ids as $id){
		echo '<li>'.$id.'</li>';
	    }
	    echo '</ul>';
	}
	?>
    </body>
</html>
