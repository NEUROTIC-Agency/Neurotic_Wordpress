/**
 * The JavaScript code you place here will be processed by esbuild, and the
 * output file will be created at `../theme/js/script.min.js` and enqueued by
 * default in `../theme/functions.php`.
 *
 * For esbuild documentation, please see:
 * https://esbuild.github.io/
 */

// Sidebar animation
const sidebar = document.querySelector('#site-navigation');
const sidebarBg = document.querySelector('#sidebar-background');
const openButton = document.querySelector('#button-open');
const openSvg = document.querySelector('.openSvg');
const closeButton = document.querySelector('#button-close');
const header = document.querySelector('#masthead');

openButton.addEventListener('click', () => {
	openSidebar();
});

closeButton.addEventListener('click', () => {
	closeSidebar();
});

function openSidebar() {
	sidebar.setAttribute('aria-expanded', true);
	sidebar.classList.replace('-right-96', 'right-0');
	header.classList.remove('overflow-hidden');
	setTimeout(() => {
		sidebarBg.classList.toggle('hidden');
	}, 300);
}

function closeSidebar() {
	sidebar.classList.replace('right-0', '-right-96');
	sidebar.setAttribute('aria-expanded', false);
	setTimeout(() => {
		sidebarBg.classList.toggle('hidden');
		header.classList.add('overflow-hidden');
	}, 300);
}

document.addEventListener('click', (event) => {
	if (
		sidebar.getAttribute('aria-expanded') === 'true' &&
		event.target.closest('nav') !== sidebar &&
		event.target !== openSvg
	) {
		closeSidebar();
	}
});

// Toggle navbar border in home

const isHome = document.querySelector('body.home');
const navbar = document.querySelector('#masthead');

if (isHome) {
	window.addEventListener('scroll', () => {
		if (window.scrollY >= 1) {
			navbar.classList.add('border-b');
		} else {
			navbar.classList.remove('border-b');
		}
	});
}

// GSAP slider animation
gsap.registerPlugin(ScrollTrigger);

const container = document.querySelector('.scroll-container');
const sliderWidth = container.scrollWidth;
let images = gsap.utils.toArray('.slider-card');

// Clone the card elements and append them to the end of the container
const cloneCards = images.map((item) => item.cloneNode(true));
cloneCards.forEach((cloneCard) => container.appendChild(cloneCard));

// Update the images array to include the new cloned cards
images = gsap.utils.toArray('.slider-card');

const cardWidth = images[0].offsetWidth + 16; // Consider the 16px spacing between cards
let animation;

const createAnimation = () => {
	animation = gsap.to(images, {
		x: '-=' + sliderWidth, // Move each card to the left by the container width
		duration: 35,
		repeat: -1,
		ease: 'none',
		modifiers: {
			x: gsap.utils.unitize((x) => {
				x = parseFloat(x) % (sliderWidth + cardWidth); // Use (sliderWidth + cardWidth) to loop back to the beginning with spacing
				return x;
			}),
		},
	});
};

const pauseAnimation = () => {
	if (animation) {
		animation.pause();
	}
};

const resumeAnimation = () => {
	if (animation) {
		animation.play();
	}
};

createAnimation();

// Pause animation when hovering over a card
images.forEach((item) => {
	item.addEventListener('mouseenter', pauseAnimation);
	item.addEventListener('mouseleave', resumeAnimation);
});
