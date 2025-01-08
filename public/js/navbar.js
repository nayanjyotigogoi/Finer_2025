const nav = document.querySelector('.nav-container');
const hamburger = document.querySelector('.hamburger');
const detectionArea = document.querySelector('.detection-area');
let lastScrollY = window.scrollY;
let isHeroSection = true;

// Show/hide navigation based on scroll position
window.addEventListener('scroll', () => {
    const currentScrollY = window.scrollY;

    // Determine if we're in the hero section (first 100vh)
    isHeroSection = currentScrollY < window.innerHeight;

    if (isHeroSection) {
        // In hero section - show nav and hide hamburger
        nav.classList.remove('hidden');
        hamburger.style.display = 'none';
    } else {
        // Below hero section - hide nav and show hamburger
        nav.classList.add('hidden');
        hamburger.style.display = 'block';
    }

    lastScrollY = currentScrollY;
});

// Show navigation when mouse enters detection area
detectionArea.addEventListener('mouseenter', () => {
    if (!isHeroSection) {
        nav.classList.remove('hidden');
    }
});

// Hide navigation when mouse leaves nav container
nav.addEventListener('mouseleave', () => {
    if (!isHeroSection) {
        nav.classList.add('hidden');
    }
});

// Toggle navigation when clicking hamburger
function toggleNav() {
    nav.classList.toggle('hidden');
}

// Initial check for hero section
window.dispatchEvent(new Event('scroll'));
