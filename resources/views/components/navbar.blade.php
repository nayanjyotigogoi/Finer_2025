@push('styles')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
        }

        .nav-container {
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            background-color: #1a237e;
            width: 250px;
            transition: transform 0.3s ease-in-out;
            z-index: 1000;
        }

        .nav-container.hidden {
            transform: translateX(-250px);
        }

        .logo-container {
            padding: 50px;
            text-align: center;
        }

        .logo {
            width: 80px;
            height: 80px;
            margin-bottom: 10px;
        }

        .logo-text {
            color: white;
            font-size: 1.2em;
            margin-bottom: 20px;
        }

        .nav-links {
            list-style: none;
            padding: 0;
        }

        .nav-links li {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            padding: 15px 50px;
            display: block;
            transition: background-color 0.3s;
        }

        .nav-links a:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .hamburger {
            display: none;
            position: fixed;
            left: 20px;
            top: 20px;
            z-index: 1001;
            background: #1a237e;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .hamburger span {
            display: block;
            width: 25px;
            height: 3px;
            background-color: white;
            margin: 5px 0;
            transition: 0.3s;
        }

        .detection-area {
            position: fixed;
            left: 0;
            top: 0;
            width: 50px;
            height: 100vh;
            z-index: 999;
        }
    </style>
    @endpush

    <div class="hamburger" onclick="toggleNav()">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <div class="detection-area"></div>

    <nav class="nav-container">
        <div class="logo-container">
            <img src="https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExcmQwaDI3MzdsZWdjejlvYTNsZWNpbXQ5ZDkzNHpkZmZqZmh2eXY2ZiZlcD12MV9naWZzX3NlYXJjaCZjdD1n/OU2rWcRfrAmSchUv70/giphy.gif" alt="FINER Logo" class="logo">
            <div class="logo-text">FINER</div>
        </div>
        <ul class="nav-links">
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#initiative">Initiative</a></li>
            <li><a href="#events">Events</a></li>
            <li><a href="#knowledge">Knowledge</a></li>
            <li><a href="#publications">Publications</a></li>
            <li><a href="#gallery">Gallery</a></li>
            <li><a href="#contact">Contact us</a></li>
        </ul>
    </nav>
@push('scripts')
    <script>
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
    </script>
@endpush