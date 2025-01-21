<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Past Events</title>
    <style>
        /* Your existing CSS remains unchanged */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        .header {
            background: linear-gradient(135deg, #000066, #0033cc);
            height: 300px;
            position: relative;
            overflow: hidden;
        }

        .wave-pattern {
            position: absolute;
            width: 100%;
            height: 100%;
            background: repeating-linear-gradient(
                45deg,
                rgba(255, 255, 255, 0.1) 0px,
                rgba(255, 255, 255, 0.1) 2px,
                transparent 2px,
                transparent 8px
            );
            animation: waveMove 20s linear infinite;
        }

        .header h1 {
            color: white;
            font-size: 48px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1;
        }

        .content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .event-title {
            color: #ff9900;
            font-size: 24px;
            margin-bottom: 30px;
        }

        .event-card {
            display: flex;
            gap: 20px;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .event-card:hover {
            transform: translateY(-2px);
        }

        .event-image {
            width: 200px;
            height: 150px;
            object-fit: cover;
            border-radius: 4px;
        }

        .event-description {
            flex: 1;
            color: #666;
            line-height: 1.6;
        }

        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 40px;
        }

        .pagination button {
            padding: 8px 12px;
            border: none;
            background: #f0f0f0;
            cursor: pointer;
            border-radius: 4px;
        }

        .pagination button.active {
            background: #000066;
            color: white;
        }

        @keyframes waveMove {
            0% {
                background-position: 0 0;
            }
            100% {
                background-position: 50px 50px;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="wave-pattern"></div>
        <h1>Past Events</h1>
    </header>

    <main class="content">
        <h2 class="event-title">Past Events</h2>
        <div id="events-container">
            <!-- Events will be populated by JavaScript -->
        </div>
        <div class="pagination" id="pagination">
            <!-- Pagination buttons will be generated dynamically -->
        </div>
    </main>

    <script>
        // Sample event data
        const events = Array(5).fill({
            image: "https://hebbkx1anhila5yf.public.blob.vercel-storage.com/new%20file%20(10).jpg-Q4RCryX9nootp8J58jDACpHMGcV7yY.jpeg",
            description: "Lorem ipsum dolor sit amet consectetur. Velit vehicula elementum eget scelerisque. Ut mollis tincidunt mus ut sed sagittis et pellentesque. Praesent a odio enim non risus facilisi lorem."
        });

        const eventsContainer = document.getElementById('events-container');
        const paginationContainer = document.getElementById('pagination');
        const eventsPerPage = 3; // Number of events per page
        let currentPage = 1; // Current active page

        // Render events for the current page
        function renderEvents() {
            const startIndex = (currentPage - 1) * eventsPerPage;
            const endIndex = startIndex + eventsPerPage;
            const visibleEvents = events.slice(startIndex, endIndex);

            eventsContainer.innerHTML = visibleEvents.map(event => `
                <div class="event-card">
                    <img src="${event.image}" alt="Event" class="event-image">
                    <p class="event-description">${event.description}</p>
                </div>
            `).join('');
        }

        // Generate pagination buttons
        function renderPagination() {
            const totalPages = Math.ceil(events.length / eventsPerPage);
            paginationContainer.innerHTML = '';

            // Generate Previous Button
            const prevButton = document.createElement('button');
            prevButton.textContent = '← Back';
            prevButton.onclick = () => changePage(currentPage - 1);
            prevButton.disabled = currentPage === 1;
            paginationContainer.appendChild(prevButton);

            // Generate Page Buttons
            for (let i = 1; i <= totalPages; i++) {
                const pageButton = document.createElement('button');
                pageButton.textContent = i;
                pageButton.className = currentPage === i ? 'active' : '';
                pageButton.onclick = () => changePage(i);
                paginationContainer.appendChild(pageButton);
            }

            // Generate Next Button
            const nextButton = document.createElement('button');
            nextButton.textContent = 'Next →';
            nextButton.onclick = () => changePage(currentPage + 1);
            nextButton.disabled = currentPage === totalPages;
            paginationContainer.appendChild(nextButton);
        }

        // Change the current page
        function changePage(page) {
            const totalPages = Math.ceil(events.length / eventsPerPage);
            if (page < 1 || page > totalPages) return; // Prevent invalid page numbers
            currentPage = page;
            renderEvents();
            renderPagination();
        }

        // Initialize the page
        function init() {
            renderEvents();
            renderPagination();
        }

        init();
    </script>
</body>
</html>
