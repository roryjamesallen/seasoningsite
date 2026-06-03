const logo_img = document.getElementById('logo-img');
const logo_stars = document.getElementById('logo-stars');
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
	collapsers[i].addEventListener('click', toggleCollapse);
    }
}

function createStar(){
    const star = document.createElement('img');
    star.src = 'images/icons/star-blue-' + (Math.floor(Math.random() * 3) + 1) + '.svg';
    star.style.width = (Math.random() + 0.5) + 'rem';
    //star.style.opacity = Math.random() * 2;
    star.style.transform = 'rotate(' + Math.floor(Math.random() * 360) + 'deg)';
    star.style.transition = 'left 30s, top 30s, transform 30s, opacity 30s, filter 30s';
    star.classList.add('logo-star');
    logo_stars.appendChild(star);
    return star;
}
function initialiseStars(number){
    for (let i=0; i<number; ++i){
	const new_star = createStar();
	stars.push(new_star);
	moveStars();
    }
}
function moveStars(){
    const rect = logo_img.getBoundingClientRect();
    for (let i=0; i<stars.length; ++i){
	stars[i].style.left = rect.left + ((rect.right - rect.left) * Math.random()) + 'px';
	stars[i].style.top = rect.top + ((rect.bottom - rect.top) * Math.random()) + 'px';
	stars[i].style.transform = 'rotate(' + Math.floor(Math.random() * 360) + 'deg)';
	//stars[i].style.opacity = Math.random() * 2;
	stars[i].style.filter = 'hue-rotate(' + (Math.random() * 360) + 'deg)'
    }
}

initialiseCollapsers();
initialiseStars(20);
setInterval(moveStars, 30000);
document.body.onresize = moveStars;
