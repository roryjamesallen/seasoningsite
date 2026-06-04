// COLLAPSERS
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
	collapsers[i].addEventListener('click', toggleCollapse);
    }
}

// GALLERY
const gallery_container = document.getElementById('gallery');
const gallery = gallery_container.getElementsByClassName('gallery')[0];
let mouse_x = null;
let mouse_start = null;
let gallery_start = null;
let last_scroll = null;
function slowDown(){
    let multiplier = 1;
    if (last_scroll < 0){
	multiplier = -1;
    }
    for (let step=0; step<=25; ++step){
	const step_offset = (25 * Math.pow(0.85, step));
	setTimeout(function(){ gallery.scrollLeft = gallery.scrollLeft + (step_offset * multiplier); }, 10 * step);
    }
}
document.onmousemove = function(e){
    mouse_x = e.pageX;
    if (mouse_start != null){
	last_scroll = mouse_start - mouse_x;
	gallery.scrollLeft = gallery_start - mouse_x;
    }
}
gallery.addEventListener('mousedown', function(e){
    mouse_start = mouse_x;
    gallery_start = mouse_start + gallery.scrollLeft;
    gallery.style.scrollSnapType = 'none';
});
document.addEventListener('mouseup', function(e){
    mouse_start = gallery_start = null;
    if (gallery.style.scrollSnapType == 'none'){
	slowDown();
    }
});

// STARS
const logo_img = document.getElementById('logo-img');
const logo_stars = document.getElementById('logo-stars');
const logo_container = document.getElementById('logo-container');
var stars = [];

function createStar(){
    const star = document.createElement('img');
    star.src = 'images/icons/star-blue-' + (Math.floor(Math.random() * 3) + 1) + '.svg';
    star.style.width = ((Math.random() + 0.5) * 2) + '%';
    star.style.transform = 'rotate(' + Math.floor(Math.random() * 360) + 'deg)';
    star.style.transition = 'left 30s, top 30s, transform 30s, opacity 30s, filter 30s';
    star.classList.add('logo-star');
    logo_container.appendChild(star);
    return star;
}
function initialiseStars(number){
    for (let i=0; i<number; ++i){
	const new_star = createStar();
	setStarPosition(new_star);
	stars.push(new_star);
	moveStars();
    }
}
function setStarPosition(star){
    star.style.left = (Math.random() * 100) + '%'
    star.style.top = (Math.random() * 100) + '%'
}
function moveStars(){
    const rect = logo_img.getBoundingClientRect();
    for (let i=0; i<stars.length; ++i){
	setStarPosition(stars[i]);
	stars[i].style.transform = 'rotate(' + Math.floor(Math.random() * 360) + 'deg)';
	stars[i].style.filter = 'hue-rotate(' + (Math.random() * 360) + 'deg)'
    }
}
function logoLoaded(){
    initialiseStars(20);
    setInterval(moveStars, 30000);
    document.body.onresize = moveStars;
}


// POPUP
if (popup){
    const popup_background = document.getElementById('popup-background');
    const popup_element = document.getElementById('popup');
    const popup_img = popup_element.children[2].children[0];
    const popup_form = popup_element.children[2].children[1];
    const frames = 8;
    const delay = 100;

    popup_element.style.display = 'block';
    setTimeout(function(){ popup_background.style.opacity = 0.75; }, 10);
    for (let i=1; i<=frames; ++i){
	setTimeout(function(){ popup_img.src = 'images/popup/' + i + '.svg'; }, delay * i);
    }
    setTimeout(function(){
	popup_form.style.opacity = '1';
    }, frames * delay);
}

initialiseCollapsers();
logo_img.onload = logoLoaded;
logo_img.src = 'images/seasoning-logo-pink.svg';
