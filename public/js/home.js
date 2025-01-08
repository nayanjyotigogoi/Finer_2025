document.addEventListener('DOMContentLoaded', () => {
    const preloader = document.getElementById('preloader');
    const topDoor = document.getElementById('top-door');
    const bottomDoor = document.getElementById('bottom-door');
    const logo = document.getElementById('logo');
    const navbar = document.getElementById('navbar');
    const home = document.getElementById('home');

    // Simulate loading time
    setTimeout(() => {
        topDoor.classList.add('open');
        bottomDoor.classList.add('open');

        setTimeout(() => {
            logo.classList.add('move-to-nav');
        }, 500);

        setTimeout(() => {
            navbar.classList.add('show');
        }, 1000);

        setTimeout(() => {
            home.classList.add('show');
            preloader.style.display = 'none';
        }, 1500);
    }, 2000); // Simulate 2 seconds of loading time
});

//hero section
document.addEventListener('DOMContentLoaded', () => {
    const heroSection = document.getElementById('heroSection');
    const imageGallery = document.getElementById('imageGallery');
    const galleryImages = imageGallery.querySelectorAll('.gallery-image');

    const heroData = [
        {
            image: "assests/hero_1.jpg",
            caption: "Explore the Wilderness",
            description: "Dive into the untouched beauty of nature's splendor."
        },
        {
            image: "assests/hero_2.jpg",
            caption: "Discover the Future",
            description: "Step into the realm of innovation and technology."
        },
        {
            image: "assests/hero_3.jpg",
            caption: "Capture the Moment",
            description: "Every frame tells a unique story worth sharing."
        },
        {
            image: "assests/hero_4.jpg",
            caption: "Embrace the Outdoors",
            description: "Find your adventure in the vast wilderness."
        },
        {
            image: "assests/hero_5.jpg",
            caption: "Step Into Tomorrow",
            description: "Witness the marvels of modern innovation."
        },
        {
            image: "assests/hero_6.jpg",
            caption: "Memories in Focus",
            description: "Every frame captures a unique and precious moment."
        }
    ];

    let currentIndex = 0;
    let backgroundInterval;

    const updateHeroContent = () => {
        const currentData = heroData[currentIndex];

        // Update hero section background
        heroSection.style.backgroundImage = `url(${currentData.image})`;

        // Update text content
        const heroTitle = heroSection.querySelector('h1');
        const heroDescription = heroSection.querySelector('p');

        // Reset and trigger text animations
        heroTitle.style.animation = "none";
        heroDescription.style.animation = "none";
        void heroTitle.offsetWidth; // Trigger reflow
        void heroDescription.offsetWidth;

        heroTitle.textContent = currentData.caption;
        heroDescription.textContent = currentData.description;

        heroTitle.style.animation = "slide-up 2s ease forwards";
        heroDescription.style.animation = "slide-up 2s ease forwards 0.2s";

        // Highlight the active image in the gallery
        galleryImages.forEach((img, index) => {
            img.classList.toggle('active', index === currentIndex);
        });

        // Adjust gallery scroll to center the active image
        const offset = Math.max(0, currentIndex * (galleryImages[0].offsetWidth + 16) - imageGallery.offsetWidth / 2 + galleryImages[0].offsetWidth / 2);
        imageGallery.style.transform = `translateX(-${offset}px)`;
    };

    const startImageCycle = () => {
        updateHeroContent();
        backgroundInterval = setInterval(() => {
            currentIndex = (currentIndex + 1) % heroData.length;
            updateHeroContent();
        }, 5000);
    };

    galleryImages.forEach((img, index) => {
        img.addEventListener('click', () => {
            clearInterval(backgroundInterval); // Stop the automatic slideshow
            currentIndex = index; // Update current index
            updateHeroContent(); // Update the hero section content
            startImageCycle(); // Restart the slideshow
        });
    });

    startImageCycle();
});




// function for count section

function setupMetricsSectionAnimation() {
    const section = document.querySelector('.count-metrics-section');
    if (!section) return; // Exit if the section is not present

    // Animated counter function
    function animateCounter(element, target) {
        let current = 0;
        const increment = target / 100;
        const duration = 2000; // 2 seconds
        const interval = duration / 100;

        const counter = setInterval(() => {
            current += increment;
            if (current >= target) {
                element.textContent = Math.floor(target) + '+';
                clearInterval(counter);
            } else {
                element.textContent = Math.floor(current);
            }
        }, interval);
    }

    // Intersection Observer to trigger animation when in view
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const numbers = entry.target.querySelectorAll('.count-number');
                    numbers.forEach((number) => {
                        const target = number.getAttribute('data-target');
                        animateCounter(number, target);
                    });
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.5 }
    );

    // Observe the metrics section
    observer.observe(section);
}

// Export the function if you're using modules
// export { setupMetricsSectionAnimation };

// Or call the function directly if this is the entry point
setupMetricsSectionAnimation();



// javascript for the sticky section
document.querySelectorAll('.sticky-section').forEach(section => {
    const cards = section.querySelectorAll('.sticky-card');
    const container = section.querySelector('.sticky-cards-grid');

    // Add event listeners only to the cards in the current section
    cards.forEach(card => {
        card.addEventListener('dragstart', (e) => {
            card.classList.add('dragging');
            e.dataTransfer.setData('text/plain', '');
        });

        card.addEventListener('dragend', () => {
            card.classList.remove('dragging');
        });
    });

    // Handle dragover event for only the cards within the current section
    container.addEventListener('dragover', (e) => {
        e.preventDefault();
        const draggingCard = section.querySelector('.dragging');
        const siblings = [...container.querySelectorAll('.sticky-card:not(.dragging)')];

        const nextSibling = siblings.find(sibling => {
            const box = sibling.getBoundingClientRect();
            const offset = e.clientY - box.top - box.height / 2;
            return offset < 0;
        });

        container.insertBefore(draggingCard, nextSibling);
    });

    container.addEventListener('dragenter', e => e.preventDefault());
    container.addEventListener('dragleave', e => e.preventDefault());
    container.addEventListener('drop', e => e.preventDefault());

    // Touch events for draggable cards
    cards.forEach(card => {
        let isDragging = false;
        let currentX, currentY, initialX, initialY, xOffset = 0, yOffset = 0;

        card.addEventListener('touchstart', dragStart, false);
        card.addEventListener('touchend', dragEnd, false);
        card.addEventListener('touchmove', drag, false);

        function dragStart(e) {
            initialX = e.touches[0].clientX - xOffset;
            initialY = e.touches[0].clientY - yOffset;

            if (e.target === card) {
                isDragging = true;
                card.classList.add('dragging');
            }
        }

        function dragEnd(e) {
            initialX = currentX;
            initialY = currentY;
            isDragging = false;
            card.classList.remove('dragging');
        }

        function drag(e) {
            if (isDragging) {
                e.preventDefault();
                currentX = e.touches[0].clientX - initialX;
                currentY = e.touches[0].clientY - initialY;
                xOffset = currentX;
                yOffset = currentY;
                setTranslate(currentX, currentY, card);
            }
        }

        function setTranslate(xPos, yPos, el) {
            el.style.transform = `translate3d(${xPos}px, ${yPos}px, 0)`;
        }
    });
});

//javascript for board of directors.

// Function to initialize the BOD carousel
function initializeBODCarousel() {
    const carouselContainer = document.querySelector('.BOD-carousel-container');
    const prevBtn = document.querySelector('.BOD-prev');
    const nextBtn = document.querySelector('.BOD-next');

    // Check if the BOD section is present
    if (!carouselContainer || !prevBtn || !nextBtn) {
        return; // Exit if the required elements are not on the page
    }

   // Use directorsData passed from Blade
const directors = directorsData.map(director => ({
    name: director.name,
    title: director.position,
    company: director.company,
    description: director.description,
    image: director.photo ? `/storage/${director.photo}` : 'assets/default-placeholder.jpg', // updated to use `photo`
}));


    let currentIndex = 0;

    function createCard(director, isActive = false) {
        const card = document.createElement('div');
        card.className = `BOD-card ${isActive ? 'active' : ''}`;
        card.innerHTML = `
            <img src="${director.image}" alt="${director.name}" class="BOD-profile-image">
            <h3 class="BOD-card-title">${director.name}</h3>
            <p class="BOD-card-subtitle">${director.title} | ${director.company}</p>
            <p class="BOD-card-description">${director.description}</p>
        `;
        return card;
    }

    function renderCarousel() {
        carouselContainer.innerHTML = '';
        const visibleCards = [
            directors[(currentIndex - 1 + directors.length) % directors.length],
            directors[currentIndex],
            directors[(currentIndex + 1) % directors.length]
        ];
        visibleCards.forEach((director, index) => {
            const isActive = index === 1; // Middle card is active
            carouselContainer.appendChild(createCard(director, isActive));
        });
    }

    function moveCarousel(direction) {
        if (direction === 'left') {
            currentIndex = (currentIndex - 1 + directors.length) % directors.length;
        } else {
            currentIndex = (currentIndex + 1) % directors.length;
        }
        renderCarousel();
    }

    prevBtn.addEventListener('click', () => moveCarousel('left'));
    nextBtn.addEventListener('click', () => moveCarousel('right'));

    // Initial render
    renderCarousel();
}

// Call the function after the DOM is fully loaded
document.addEventListener('DOMContentLoaded', initializeBODCarousel);





//javascript for event section

document.addEventListener('DOMContentLoaded', () => {
    const eventSection = document.querySelector('.event-upcoming-events'); // Scope to the section

    if (eventSection) {
        const eventCards = eventSection.querySelectorAll('.event-main-event-card');
        const dots = eventSection.querySelectorAll('.event-dot');

        function showEvent(index) {
            // Hide all events
            eventCards.forEach(card => card.classList.remove('active'));
            // Show selected event
            eventCards[index].classList.add('active');

            // Update dots
            dots.forEach(dot => dot.classList.remove('active'));
            dots[index].classList.add('active');
        }

        // Add click handlers to dots
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                showEvent(index);
            });
        });

        // Optional: Auto-rotate events every 5 seconds
        let currentIndex = 0;
        setInterval(() => {
            currentIndex = (currentIndex + 1) % eventCards.length;
            showEvent(currentIndex);
        }, 5000);
    }
});


// javascript for vision & mission

document.addEventListener('DOMContentLoaded', () => {
    // Check if the Vision & Mission section exists
    const visionSection = document.querySelector('.vision-container');
    if (!visionSection) return; // Exit if the section doesn't exist

    // Array of image descriptions
    const descriptions = [
        "Description for Initiative Event 1",
        "Description for Initiative Event 2",
        "Description for Initiative Event 3",
        "Description for Initiative Event 4"
    ];

    // Auto-scroll functionality
    const gallery = visionSection.querySelector('.vision-gallery-container');
    if (!gallery) return; // Exit if the gallery doesn't exist

    let scrollAmount = 0;
    let isScrolling = true;

    function autoScroll() {
        if (isScrolling) {
            scrollAmount += 2;
            gallery.scrollLeft = scrollAmount;
            if (scrollAmount >= gallery.scrollWidth - gallery.clientWidth) {
                scrollAmount = 0; // Reset scroll amount
            }
        }
    }

    const scrollInterval = setInterval(autoScroll, 50); // Adjust speed as needed

    // Stop scrolling on hover
    gallery.addEventListener('mouseover', () => {
        isScrolling = false;
    });

    // Resume scrolling when hover ends
    gallery.addEventListener('mouseout', () => {
        isScrolling = true;
    });

    // Display description on hover
    const galleryItems = visionSection.querySelectorAll('.vision-gallery-item');

    galleryItems.forEach((item, index) => {
        const description = document.createElement('div');
        description.textContent = descriptions[index]; // Use the description from the array
        description.style.position = 'absolute';
        description.style.bottom = '10px';
        description.style.left = '10px';
        description.style.padding = '5px 10px';
        description.style.backgroundColor = 'rgba(0, 0, 0, 0.7)';
        description.style.color = 'white';
        description.style.borderRadius = '5px';
        description.style.display = 'none';

        item.style.position = 'relative'; // Ensure the item has a position context
        item.appendChild(description);

        item.addEventListener('mouseover', () => {
            description.style.display = 'block';
        });

        item.addEventListener('mouseout', () => {
            description.style.display = 'none';
        });
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const blogSection = document.querySelector('.blog-section'); // Scope to the specific section
    if (!blogSection) return; // Exit if the section is not present

    const posts = blogSection.querySelectorAll('.blog-post');
    const dots = blogSection.querySelectorAll('.blog-dot');
    let currentIndex = 0;

    const showPosts = (index) => {
        posts.forEach((post, i) => {
            post.style.display = i >= index && i < index + 2 ? 'block' : 'none';
        });
        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === index / 2);
        });
    };

    dots.forEach((dot, i) => {
        dot.addEventListener('click', () => {
            currentIndex = i * 2;
            showPosts(currentIndex);
        });
    });

    showPosts(currentIndex);
});