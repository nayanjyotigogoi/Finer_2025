<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Navbar</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-size: small;
            font-family: 'Poppins', sans-serif;
        }

        /* Navbar styling */
        .nav-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #1a237e;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            z-index: 1000;
            transition: transform 0.3s ease-in-out, background-color 0.3s ease-in-out;
        }

        .nav-container.transparent {
            background-color: rgba(26, 35, 126, 0.5);
        }

        .nav-container.hidden {
            transform: translateY(-100%);
        }

        .nav-links {
            padding-left: 150px;
            padding-right: 30px;
            list-style: none;
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            transition: background-color 0.3s;
        }

        .nav-links a:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo {
            width: 50px;
            height: 50px;
        }

        .logo-text {
            font-size: 1.2em;
            font-weight: bold;
        }

        /* Button styling */
        .member-btn {
            background-color: rgba(255, 161, 19, 1);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .member-btn:hover {
            background-color: rgba(255, 145, 0, 1);
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <nav class="nav-container">
        <div class="logo-container">
            <img src="https://via.placeholder.com/50" alt="Logo" class="logo">
            <div class="logo-text">FINER</div>
        </div>
        <ul class="nav-links">
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#initiative">Initiative</a></li>
            <li><a href="#events">Events</a></li>
            <li><a href="#events">Knowledge</a></li>
            <li><a href="#events">Publications</a></li>
            <li><a href="#gallery">Gallery</a></li>
            <li><a href="#contact">Contact Us</a></li>
        </ul>
        <button class="member-btn">Become a Member</button>
    </nav>

    <script>
const nav = document.querySelector('.nav-container');
let lastScrollY = window.scrollY;

window.addEventListener('scroll', () => {
    const currentScrollY = window.scrollY;

    if (currentScrollY === 0) {
        // At the very top of the page: Semi-transparent navbar
        nav.classList.add('transparent');
        nav.classList.remove('hidden');
        nav.style.backgroundColor = ''; // Reset inline styles
    } else if (currentScrollY < window.innerHeight) {
        // In the hero section: Fully visible with no transparency
        nav.classList.remove('transparent');
        nav.classList.remove('hidden');
        nav.style.backgroundColor = ''; // Reset inline styles
    } else {
        // Below the hero section
        nav.classList.remove('transparent');
        if (currentScrollY > lastScrollY) {
            nav.classList.add('hidden'); // Hide on scroll down
        } else {
            nav.classList.remove('hidden'); // Show on scroll up
        }
    }

    lastScrollY = currentScrollY;
});

// Trigger initial scroll check
window.dispatchEvent(new Event('scroll'));

    </script>
</body>
</html>
