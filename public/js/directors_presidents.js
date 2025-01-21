document.addEventListener('DOMContentLoaded', () => {
    // Function to create a card
    const createCard = (data, type) => {
        const card = document.createElement('div');
        card.classList.add('BOD-card');
        
        let imagePath;
        
        // Set image path for Director and President accordingly
        if (type === 'director') {
            imagePath = data.photo ? `/storage/director_profiles/${data.photo}` : 'default-image.jpg';
        } else if (type === 'president') {
            imagePath = `/storage/past_presidents/${data.photo}`;

        }

        card.innerHTML = `
            <img src="${imagePath}" alt="${data.name}" class="BOD-profile-image">
            <h3 class="BOD-card-title">${data.name}</h3>
            <p class="BOD-card-subtitle">${data.position} | ${data.company}</p>
            <p class="BOD-card-description">${data.description ?? 'No description available'}</p>
        `;
        
        console.log('Creating card:', card); // Log each card created
        return card;
    };

    // Function to initialize the carousel
    const initializeCarousel = (data, containerId, prevBtnClass, nextBtnClass, type) => {
        const container = document.getElementById(containerId);
        const prevBtn = document.querySelector(`.${prevBtnClass}`);
        const nextBtn = document.querySelector(`.${nextBtnClass}`);

        if (!container || !prevBtn || !nextBtn) {
            console.error(`Carousel elements missing for container: ${containerId}`);
            return;
        }

        let currentIndex = 0;

        const renderCarousel = () => {
            container.innerHTML = ''; // Clear current cards
            const visibleCards = [
                data[(currentIndex - 1 + data.length) % data.length], // Previous card
                data[currentIndex], // Current card
                data[(currentIndex + 1) % data.length], // Next card
            ];
            visibleCards.forEach((item, index) => {
                const card = createCard(item, type);
                if (index === 1) card.classList.add('active'); // Highlight current card
                container.appendChild(card);
            });
        };

        const moveCarousel = (direction) => {
            if (direction === 'left') {
                currentIndex = (currentIndex - 1 + data.length) % data.length;
            } else {
                currentIndex = (currentIndex + 1) % data.length;
            }
            renderCarousel();
        };

        prevBtn.addEventListener('click', () => moveCarousel('left'));
        nextBtn.addEventListener('click', () => moveCarousel('right'));

        // Initial render
        renderCarousel();
    };

    // Log data to ensure it's available
    console.log('Directors Data:', directorsData);
    console.log('Past Presidents Data:', pastPresidentsData);

    // Initialize both carousels (Directors and Past Presidents)
    initializeCarousel(directorsData, 'directors-container', 'BOD-prev[data-target="directors-container"]', 'BOD-next[data-target="directors-container"]', 'director');
    initializeCarousel(pastPresidentsData, 'presidents-container', 'BOD-prev[data-target="presidents-container"]', 'BOD-next[data-target="presidents-container"]', 'president');
});
