<?php
include '../lib.php';

function getValueOptions($key){
    $venues = getEventValueList($key);
    $output = '';
    foreach ($venues as $index => $venue){
	$output .= '<option value="'.$venue.'">'.$venue.'</option>';
    }
    return $output;
}
function renderCreateEventForm(){
    echo '<form id="event-form"><hr>
    <span><label for="date-input">Event Date: </label><input type="date" id="date-input" name="date"></span><hr>
    <span><label for="venue-input">Venue: </label><select id="venue-input" name="venue"><option></option>'.getValueOptions('venue').'</select><input name="new-venue" placeholder="Or New Venue Name"></input></span><hr>
<span><label for="city-input">City: </label><select id="city-input" name="city"><option></option>'.getValueOptions('city').'</select><input name="new-city" placeholder="Or New City"></input></span><hr>
<span id="full-artist-0"><label for="artist-input-0">Artist 1: </label><select id="artist-input-0" name="artist-0"><option></option>'.getValueOptions('artists').'</select><input name="new-artist-0" placeholder="Or New Artist Name"></span>
<div class="button" id="add-artist">Add Another Artist</div>
    </form>';
}
?>
