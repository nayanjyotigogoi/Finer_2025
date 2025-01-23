// Function to initialize the BOD carousel
function initializeBODCarousel() {
    const carouselContainer = document.querySelector('.BOD-carousel-container');
    const prevBtn = document.querySelector('.BOD-prev');
    const nextBtn = document.querySelector('.BOD-next');

    // Check if the BOD section is present
    if (!carouselContainer || !prevBtn || !nextBtn) {
        return;
    }

    // Use directorsData passed from Blade
    const directors = directorsData.map(director => ({
        name: director.name,
        title: director.position,
        company: director.company,
        description: director.description,
        image: director.photo ? `/storage/${director.photo}` : 'assets/default-placeholder.jpg',
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
            const isActive = index === 1;
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

    renderCarousel();
}

document.addEventListener('DOMContentLoaded', initializeBODCarousel);


// Function to initialize the Past Presidents carousel
function initializePastPresidentsCarousel() {
    const carouselContainer = document.querySelector('.past-presidents-carousel-container');
    const prevBtn = document.querySelector('.past-presidents-prev');
    const nextBtn = document.querySelector('.past-presidents-next');

    // Check if the Past Presidents section is present
    if (!carouselContainer || !prevBtn || !nextBtn) {
        return;
    }

    // Use pastPresidentsData passed from Blade
    const pastPresidents = pastPresidentsData.map(president => ({
        name: president.name,
        title: president.position,
        description: president.description,
        image: president.photo ? `/storage/${president.photo}` : 'assets/default-placeholder.jpg',
    }));

    let currentIndex = 0;

    function createCard(president, isActive = false) {
        const card = document.createElement('div');
        card.className = `past-presidents-card ${isActive ? 'active' : ''}`;
        card.innerHTML = `
            <img src="${president.image}" alt="${president.name}" class="past-presidents-profile-image">
            <h3 class="past-presidents-card-title">${president.name}</h3>
            <p class="past-presidents-card-subtitle">${president.title}</p>
            <p class="past-presidents-card-description">${president.description}</p>
        `;
        return card;
    }

    function renderCarousel() {
        carouselContainer.innerHTML = '';
        const visibleCards = [
            pastPresidents[(currentIndex - 1 + pastPresidents.length) % pastPresidents.length],
            pastPresidents[currentIndex],
            pastPresidents[(currentIndex + 1) % pastPresidents.length]
        ];
        visibleCards.forEach((president, index) => {
            const isActive = index === 1;
            carouselContainer.appendChild(createCard(president, isActive));
        });
    }

    function moveCarousel(direction) {
        if (direction === 'left') {
            currentIndex = (currentIndex - 1 + pastPresidents.length) % pastPresidents.length;
        } else {
            currentIndex = (currentIndex + 1) % pastPresidents.length;
        }
        renderCarousel();
    }

    prevBtn.addEventListener('click', () => moveCarousel('left'));
    nextBtn.addEventListener('click', () => moveCarousel('right'));

    renderCarousel();
}

document.addEventListener('DOMContentLoaded', initializePastPresidentsCarousel);
