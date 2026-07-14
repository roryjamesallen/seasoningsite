<!DOCTYPE html>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set("Europe/London");
@session_start();

if (!isset($_SESSION['create_popup_cookie'])){
    $_SESSION['create_popup_cookie'] = 'false';
}
if (isset($_POST['signup'])){
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $old_emails = json_decode(file_get_contents('../emails.json'), true);
        //$old_emails = [];
        if (!isset($old_emails[$_POST['email']])){ // Only submit if not already submitted
            $old_emails[$_POST['email']] = array('time'=>date('c'), 'ip'=>$_SERVER['REMOTE_ADDR']);
            file_put_contents('../emails.json', json_encode($old_emails));
        }
        $_SESSION['create_popup_cookie'] = 'true';
        header('Location: ?msg=Signed+up!');
    } else {
        header('Location: ?e=Please+enter+a+valid+email+address!');
    }
}

include 'lib.php';
?>
<html lang="en">
    <head>
	<?php renderSEO(); ?>
	<link rel="stylesheet" href="style.css?v=<?php echo file_get_contents($root.'css-version.txt'); ?>">
    </head>
    <?php echo $analytics ?>
    
    <body>
	<div id="popup">
	    <form method="POST">
		<h2 class="star-container" stars="5" star-size="5">Keep in touch!</h2>
		<p class="error"><?php if (isset($_GET['e'])){ echo $_GET['e']; } ?></p>
		<input type="email" name="email" placeholder="you@example.com">
		<input type="submit" value="Sign Up" name="signup">
		<div id="close-popup">✖</div>
	    </form>
	    
	</div>
	
	<?php renderTitle('Rave Culture is<br>Folk Culture');
	?>

	<div class="secondary-background">
	    <?php
	    renderPageBreak(1, 'primary');
	    echo '<br>';
	    renderUpcomingAndPastEvents(false,'. Watch this space...');
	    ?>
	</div>
	
	
	<?php
        if (false){
            echo '
	     <h2 class="collapser collapser-collapsed" collapse="faqs">FAQs</h2>
	     <div class="paragraph collapsed" id="faqs" style="margin: 1rem auto 2rem">
	     <hr>
	     <h3>What is this?</h3>
	     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
	     <hr>
	     <h3>What is this?</h3>
	     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
	     </div>
	     <hr>';
        }
	     ?>

	<?php renderPageBreak(2, 'secondary'); ?>
        <br>
	<h2 class="collapser" collapse="mixes">Mixes</h2>
	<div class="paragraph" id="mixes" style="margin: 1rem auto 2rem">

	    <p><a href="artist/Om+Unit">Om Unit</a> closes <a href="festival">Seasoning Festival 2026</a> as part of the Spirit takeover, recorded live on Sunday night in Stroud. Our first post-festival contribution to the Seasoning mix series begins where the weekend ended: in the final stretch of a room still moving, still open, still finding new reserves of energy after three days together.</p>
	    
	    <iframe loading="lazy" width="100%" height="400" src="https://player-widget.mixcloud.com/widget/iframe/?feed=%2FSeas0ning%2Fseason%25C9%25AAng005-om-unit-l%25C9%25AAve-from-season%25C9%25AAng-fest%25C9%25AAval-2026%2F" frameborder="0" allow="encrypted-media; fullscreen; autoplay; idle-detection; speaker-selection; web-share;" ></iframe>
	    <p style="flex-basis: 100%;">Across the last 90 minutes of his closing set, Om Unit moves with unmistakable emotional fluency through dubstep classics, bleep pressure, contemporary club foundations, unreleased edits and his own idiosyncratic productions. Caspa & Rusko-era nostalgia, Ability II’s “Pressure Dub,” Gaszia’s “Taste,” deep bassweight, breakbeat lift and rave euphoria all pass through the mix with class, warmth and soul.</p>
	    <hr style="flex-basis: 100%;">
	    <iframe loading="lazy" width="50%" height="400" src="https://player-widget.mixcloud.com/widget/iframe/?feed=%2Fworldwidefm%2Flove-cuts-lovellious-w-fraser-dahdouh-seasoning-special-08-05-26%2F" frameborder="0" allow="speaker-selection; web-share;"></iframe>
	    <p>Listen back to the <a href="https://www.instagram.com/l0ve.cuts/">Love Cuts</a> 'Seasoning Special' <a href="https://www.worldwidefm.net/">Worldwide FM</a> broadcast: Fraser and <a href="artist/Lovellious">Lovellious</a> discuss the meaning behind the 'Rave Culture is Folk Culture' slogan ahead of <a href="festival">Seasoning Festival 2026</a> , interspersed with mystic folky funky music.</p>
	</div>
            <br>

	
	<div class="tertiary-background">
	    <?php renderPageBreak(1, 'primary');?>
            <br>
	    <h2 class="collapser collapser" collapse="gallery">Gallery</h2>
	    <div class="paragraph" id="gallery">
		<p style="flex-basis: 100%; margin: 0 auto">Relive <a href="festival">Seasoning Festival 2026</a> through the lens of on-site photographer <a href="https://www.instagram.com/samuelwilsonphotography/">Samuel Wilson</a>.
		</p>
		<div class="gallery-container">
		    <div class="gallery-gradient"></div>
		    <div class="gallery">
			<img src="images/gallery/seasoning-festival-photo-1.jpg" alt="Fabric sails at Seasoning Festival 2026, Stroud" draggable="false">
			<img src="images/gallery/seasoning-festival-photo-2.jpg" alt="Attendees outside The SVA, Stroud at Seasoning Festival 2026" draggable="false">
			<img src="images/gallery/seasoning-festival-photo-4.jpg" alt="Person wearing Seasoning Festival 2026 T-Shirt" draggable="false">
			<img src="images/gallery/seasoning-festival-photo-5.jpg" alt="Pizzas being served at Seasoning Festival 2026, Stroud" draggable="false">
			<img src="images/gallery/seasoning-festival-photo-6.jpg" alt="Wall art being drawn at Seasoning Festival 2026, Stroud" draggable="false">
			<img src="images/gallery/seasoning-festival-photo-7.jpg" alt="Printing press beig used at Seasoning Festival 2026, Stroud" draggable="false">
 			<img src="images/gallery/seasoning-festival-photo-8.jpg" alt="Hand painted blue and pink moon for Seasoning Festival 2026, Stroud" draggable="false">
			<img src="images/gallery/seasoning-festival-photo-9.jpg" alt="Hay bales and fabric flags at Seasoning Festival 2026, Stroud" draggable="false">
			<img src="images/gallery/seasoning-festival-photo-10.jpg" alt="A person in the stocks at Seasoning Festival 2026, Stroud" draggable="false">
			<img src="images/gallery/seasoning-festival-photo-11.jpg" alt="The Goods Yard outside bar at Seasoning Festival 2026, Stroud" draggable="false">
			<img src="images/gallery/seasoning-festival-photo-3.jpg" alt="Attendees at at Seasoning Festival 2026, Stroud" draggable="false">
		    </div>
		</div>
	    </div>
	    <br>
	</div>
	<?php renderPageBreak(2, 'tertiary');?>
    </body>
    
    <?php renderFooter() ?>
</html>

<script type="module" src="scripts.js"></script>
<script>
 const create_popup_cookie = '<?php echo $_SESSION["create_popup_cookie"]; ?>';
 const popup_element = document.getElementById('close-popup');
 popup_element.addEventListener('click', closePopup);

 function setCookie(cname, cvalue, exdays) {
     const d = new Date();
     d.setTime(d.getTime() + (exdays*24*60*60*1000));
     let expires = "expires="+ d.toUTCString();
     document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
 }
 function getCookie(cname) {
     let name = cname + "=";
     let decodedCookie = decodeURIComponent(document.cookie);
     let ca = decodedCookie.split(';');
     for(let i = 0; i <ca.length; i++) {
	 let c = ca[i];
	 while (c.charAt(0) == ' ') {
	     c = c.substring(1);
	 }
	 if (c.indexOf(name) == 0) {
	     return c.substring(name.length, c.length);
	 }
     }
     return true;
 }
 function closePopup(){
     setCookie('popup', 'false', 365);
     popup_element.parentNode.parentNode.style.top = ' -100vh';
 }

 if (create_popup_cookie == 'true' || getCookie('popup') == 'false'){
     closePopup();
 } else {
     popup_element.parentNode.parentNode.style.top = '0px';
 }
</script>
