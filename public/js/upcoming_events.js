 // Function to render events
 function renderEvents() {
    const eventsList = document.getElementById('eventsList');
    events.forEach(event => {
        const eventCard = document.createElement('div');
        eventCard.className = 'event-card';
        eventCard.innerHTML = `
            <div class="event-image-container">
                <img src="/storage/${event.image}" alt="${event.title}" class="event-image">
                <div class="date-badge">
                    <span class="month">${new Date(event.event_date).toLocaleString('default', { month: 'short' })}</span>
                    <span class="day">${new Date(event.event_date).getDate()}</span>
                </div>
            </div>
            <div class="event-content">
                <h3>${event.title}</h3>
                <p>${event.description}</p>
            </div>
        `;
        eventsList.appendChild(eventCard);
    });
}

// Render the events when the page is loaded
document.addEventListener('DOMContentLoaded', renderEvents);