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

// TOGGLERS
function toggleToggle(event){
    const this_toggler = event.target;
    const togglers = document.getElementsByClassName('toggler');
    for (let i=0; i<togglers.length; ++i){
	const toggler = togglers[i];
	const togglee = document.getElementById(toggler.getAttribute('toggle'));
	if (toggler != this_toggler){ // For every other toggle
	    togglee.classList.add('toggled-off');
	    toggler.classList.add('toggler-off');
	} else {
	    togglee.classList.remove('toggled-off');
	    toggler.classList.remove('toggler-off');
	}
    }
}
function initialiseTogglers(){
    const togglers = document.getElementsByClassName('toggler');
    for (let i=0; i<togglers.length; ++i){
	togglers[i].addEventListener('click', toggleToggle);
    }
}

// GALLERY
const gallery_elements = document.getElementsByClassName('gallery-container');
let galleries = [];
let mouse_x = null;
for (let i=0; i<gallery_elements.length; ++i){
    const gallery = {
	element: gallery_elements[i].getElementsByClassName('gallery')[0],
	mouse_start: null,
	gallery_start: null,
	last_scroll: null,
	slowDown: function(){
	    const element = this.element;
	    let multiplier = 1;
	    if (this.last_scroll < 0){
		multiplier = -1;
	    }
	    for (let step=0; step<=25; ++step){
		const step_offset = (25 * Math.pow(0.85, step));
		setTimeout(function(){ element.scrollLeft = element.scrollLeft + (step_offset * multiplier); }, 10 * step);
	    }
	}
    }

    gallery.element.addEventListener('mousedown', function(e){
	gallery.mouse_start = mouse_x;
	gallery.gallery_start = gallery.mouse_start + gallery.element.scrollLeft;
	gallery.element.style.scrollSnapType = 'none';
    });
    galleries.push(gallery);
}

document.onmousemove = function(e){
    mouse_x = e.pageX;
    for (let i=0; i<galleries.length; ++i){
	const gallery = galleries[i];
	if (gallery.mouse_start != null){
	    gallery.last_scroll = gallery.mouse_start - mouse_x;
	    gallery.element.scrollLeft = gallery.gallery_start - mouse_x;
	}
    }
}
document.addEventListener('mouseup', function(e){
    for (let i=0; i<galleries.length; ++i){
	const gallery = galleries[i];
	gallery.mouse_start = gallery.gallery_start = null;
	if (gallery.element.style.scrollSnapType == 'none'){
	    gallery.slowDown();
	}
    }
});



// STARS
const logo_img = document.getElementById('logo-img');
const logo_stars = document.getElementById('logo-stars');
const logo_container = document.getElementById('logo-container');
var stars = [];

function createStar(container){
    const star = document.createElement('img');
    star.src = 'images/icons/star-blue-' + (Math.floor(Math.random() * 3) + 1) + '.svg';
    star.style.width = ((Math.random() + 0.5) * container.getAttribute('star-size')) + '%';
    star.style.transform = 'rotate(' + Math.floor(Math.random() * 360) + 'deg)';
    star.style.transition = 'left 30s, top 30s, transform 30s, opacity 30s, filter 30s';
    star.classList.add('logo-star');
    container.appendChild(star);
    return star;
}
function initialiseStars(){
    const star_containers = document.getElementsByClassName('star-container');
    for (let i=0; i<star_containers.length; ++i){
	const container = star_containers[i]
	const number = container.getAttribute('stars');
	for (let j=0; j<number; ++j){
	    const new_star = createStar(container);
	    setStarPosition(new_star);
	    stars.push(new_star);
	    moveStars();
	}
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
    initialiseStars();
    setInterval(moveStars, 30000);
    document.body.onresize = moveStars;
}


// POPUP
if (popup){
    setTimeout(function(){ document.getElementById('popup').style.top = 0; }, 10);
}

initialiseCollapsers();
initialiseTogglers();
logo_img.onload = logoLoaded;
logo_img.src = 'images/seasoning-logo-pink.svg';
