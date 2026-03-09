<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$root = '../';
include 'admin_lib.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
	<link rel="stylesheet" href="../style.css?v=38">
    </head>
    <body>
	<h2 style="margin-top: 2rem">Seasoning Admin Portal</h2>

	<h3>Create Event</h3><br>
	<div class="paragraph">
	    <?php renderCreateEventForm(); ?>
	</div>
    </body>
</html>

<script>
 const event_form = document.getElementById('event-form');
 const add_artist_button = document.getElementById('add-artist');

 function findArtistCount(){
     let artist_count = 0;
     while (true){
	 if (document.getElementById('artist-input-'+artist_count) != null){
	     artist_count += 1;
	 } else {
	     return artist_count;
	 }
     }
 }
 function addArtist(){
     artist_index = findArtistCount();
     const first_artist_span = document.getElementById('full-artist-0');
     const new_artist_span = first_artist_span.cloneNode(true);
     new_artist_span.id = 'full-artist-'+artist_index;
     new_artist_span.children[0].htmlFor = 'artist-input-'+artist_index;
     new_artist_span.children[0].innerText = 'Artist '+(artist_index+1)+':';
     new_artist_span.children[1].id = 'artist-input-'+artist_index;
     new_artist_span.children[1].name = 'artist-'+artist_index;
     new_artist_span.children[2].name = 'new-artist-'+artist_index;
     document.getElementById('full-artist-'+(artist_index-1)).after(new_artist_span);
 }
 
 add_artist_button.addEventListener('click', addArtist);
</script>
