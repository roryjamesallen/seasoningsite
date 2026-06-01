<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'lib.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
	<?php renderSEO(); ?>
	<link rel="stylesheet" href="style.css?v=<?php echo file_get_contents($root.'css-version.txt'); ?>">
    </head>
    <?php echo $analytics ?>
    
    <body>

	<?php renderTitle('Live events in the South West and beyond'); ?>
	
	
	<!-- <h3 class="paragraph" style="text-align: right">Building durable scenes in a thriving dance music ecosystem, inspired by the spirit of rave.</h3>-->

	<hr>

	<!--
	<div class="paragraph" style="margin-top: 1rem; height: fit-content">
	    <iframe id="ra-embed" src="https://ra.co/promoters/119677/widget/events?theme=dark&customBackgroundColor=%2332262E&customTextColor=" width="100%" style="border: none; mix-blend-mode: lighten; aspect-ratio: 2 / 1"></iframe>
	</div>
	-->
	
	<h3 style="margin-top: 1rem;" class="collapser" collapse="event-list">All Shows</h3>
	<div class="paragraph" style="margin-top: 1rem" id="event-list">
	    <?php renderEventList(); ?>
	</div>
	    
    </body>

    <?php renderFooter() ?>
</html>
<script>
 const logo_img = document.getElementById('logo-img');
 var stars = [];
 
 function toggleCollapse(event){
     const collapser = event.target;
     const collapsee = document.getElementById(collapser.getAttribute('collapse'));
     if ([...collapsee.classList].includes('collapsed')){
	 collapsee.classList.remove('collapsed')
	 collapser.classList.remove('collapser-collapsed');
     } else {
	 collapsee.classList.add('collapsed');
	 collapser.classList.add('collapser-collapsed');
     }
 }

 function initialiseCollapsers(){
     const collapsers = document.getElementsByClassName('collapser');
     for (let i=0; i<collapsers.length; ++i){
	 console.log(collapsers[i]);
	 collapsers[i].addEventListener('click', toggleCollapse);
     }
 }
 
 function createStar(){
     const star = document.createElement('img');
     star.src = 'images/icons/star-blue-' + (Math.floor(Math.random() * 3) + 1) + '.svg';
     star.style.width = Math.random() + 'rem';
     //star.style.opacity = Math.random() * 2;
     star.style.transform = 'rotate(' + Math.floor(Math.random() * 360) + 'deg)';
     star.classList.add('logo-star');
     document.body.appendChild(star);
     return star;
 }
 function initialiseStars(number){
     for (let i=0; i<number; ++i){
	 const new_star = createStar();
	 stars.push(new_star);
	 moveStars();
	 new_star.style.transition = 'left 50s, top 50s, transform 50s, opacity 50s, filter 50s';
     }
 }
 function moveStars(){
     const rect = logo_img.getBoundingClientRect();
     const bleed = 50;
     for (let i=0; i<stars.length; ++i){
	 stars[i].style.left = (rect.left - bleed) + ((rect.right - rect.left) * Math.random()) + 'px';
	 stars[i].style.top = rect.top + ((rect.bottom - rect.top) * Math.random()) + 'px';
	 stars[i].style.transform = 'rotate(' + Math.floor(Math.random() * 360) + 'deg)';
	 //stars[i].style.opacity = Math.random() * 2;
	 stars[i].style.filter = 'hue-rotate(' + (Math.random() * 360) + 'deg)'
     }
 }
 
 window.onload = (event) => {
     initialiseCollapsers();
     initialiseStars(50);
     setInterval(moveStars, 50000);
 };
</script>
