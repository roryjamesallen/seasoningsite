<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$root = '../../';
include '../../lib.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
	<base href="<?php echo $root ?>">
	<?php renderSEO('Seasoning Festival 2026 - Rave Culture Is Folk Culture', 'https://seasoning.live/festival', 'festival/favicon'); ?>
	<link rel="stylesheet" href="style.css?v=<?php echo file_get_contents($root.'css-version.txt'); ?>">
	<link rel="stylesheet" href="festival/festival-style.css?v=5">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    </head>
    <?php echo $analytics ?>

    <body>
	<img src="festival/seasoning-festival-logo.svg" alt="Logo for Seasoning Festival 2026" class="paragraph" style="margin-top: 2rem">
	<h1 style="display: none">Seasoning Festival 2026 - Information</h1>
	<img src="festival/blue-circle-background.svg" style="position: absolute; top: 100vh; left: 0; width: 100%; z-index: -1" alt="Blue circles background image">
	<img src="festival/lightning-background.svg" style="position: absolute; top: 100vh; left: 0; width: 100%; z-index: -1" alt="Yellow lightning background image">
	<img src="festival/lightning-background.svg" style="position: absolute; top: 300vh; left: 0; width: 100%; z-index: -1" alt="Yellow lightning background image">
	<div class="paragraph" id="section-group" style="margin-top: 3rem; gap: 1rem; position: relative">
	    <div class="section">
		<h3 style="color: var(--red)">Tickets</h3>
		<p>blahhahahh hahsbadf blasjasfbsf</p>
	    </div>
	    <div class="section right">
		<h3 style="color: var(--dark-blue)">Getting Here</h3>
		<p>blahhahahh hahsbadf blasjasfbsf</p>
	    </div>
	    <div class="section">
		<h3 style="color: var(--green)">Timetable</h3>
		<p>blahhahahh hahsbadf blasjasfbsf</p>
	    </div>
	</div>
    </body>

    <?php renderFooter() ?>
</html>

<style>
 body {
     background-color: var(--beige);
 }
 .paragraph, .paragraph * {
     color: var(--background);
 }
</style>

<script>
 const focus_only_one = false;
 
 function focusSelf(event){
     let focused_section = event.target; // Maybe the section, maybe a child element
     if (focused_section.parentNode.classList.contains('button-container') || focused_section.parentNode.parentNode.classList.contains('button-container')){ // Don't do anything if clicking a buy button
	 return;
     }
     while (!focused_section.classList.contains('section')){ // Recurse up until its the section rather than a child element
	 focused_section = focused_section.parentNode;
     }
     let group = focused_section.parentNode; // Go up one more time to get the group
     for (let i=0; i<group.children.length; ++i){
	 const section = group.children[i];
	 if (section == focused_section && !section.classList.contains('focused')){
	     section.classList.add('focused');
	 } else if (section.classList.contains('focused') && focus_only_one){
	     section.classList.remove('focused');
	 }
     }
 }
 function initialiseFocusGroup(){
     const group = document.getElementById('section-group');
     const sections = group.querySelectorAll(".section");
     for (let i=0; i<sections.length; ++i){
	 const section = sections[i];
	 section.addEventListener('click', focusSelf);
     }
 }
 document.addEventListener("DOMContentLoaded", function() {
     initialiseFocusGroup();
 });
</script>
