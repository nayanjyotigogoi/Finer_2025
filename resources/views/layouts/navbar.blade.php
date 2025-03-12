<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Top Navbar</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
        }

        .nav-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: rgba(45, 51, 138, 0.8);
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            z-index: 1000;
            transition: transform 0.3s ease-in-out, background-color 0.3s ease-in-out;
        }

        .nav-container.hidden {
            transform: translateY(-100%);
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .logo {
            width: 45px;
            height: 50px;
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .nav-links li {
            position: relative;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            padding: 10px 12px;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: background-color 0.3s ease;
        }

        .nav-links a:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .dropdown-icon {
            font-size: 0.8em;
            transition: transform 0.3s ease;
        }

        .dropdown:hover .dropdown-icon {
            transform: rotate(180deg);
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            background-color: rgba(26, 35, 126, 0.9);
            padding: 10px 0;
            list-style: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            display: none;
            z-index: 1000;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown-menu a {
            display: block;
            padding: 10px 20px;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .dropdown-menu a:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .conference-btn {
            background-color: rgba(255, 161, 19, 1);
            color: white;
            border: none;
            padding: 10px 6px;
            border-radius: 5px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .conference-btn:hover {
            background-color: rgba(255, 145, 0, 1);
            transform: scale(1.05);
        }

        .member-btn {
            background-color: rgba(255, 161, 19, 1);
            color: white;
            border: none;
            padding: 10px 6px;
            border-radius: 5px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .member-btn:hover {
            background-color: rgba(255, 145, 0, 1);
            transform: scale(1.05);
        }

        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
        }

        .hamburger span {
            width: 25px;
            height: 3px;
            background-color: white;
            margin: 2px 0;
            transition: 0.4s;
        }

        @media screen and (max-width: 768px) {
            .nav-links {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 70px;
                left: 0;
                width: 100%;
                background-color: rgba(45, 51, 138, 0.95);
                padding: 20px;
            }

            .nav-links.active {
                display: flex;
            }

            .nav-links li {
                width: 100%;
            }

            .dropdown-menu {
                position: static;
                background-color: transparent;
                box-shadow: none;
                display: none;
                padding-left: 20px;
            }

            .dropdown.active .dropdown-menu {
                display: block;
            }

            .hamburger {
                display: flex;
            }

            .member-btn {
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
    <nav class="nav-container">
        <div class="logo-container">
            <img src="assests/darkbackground_logo.png" alt="Logo" class="logo">
        </div>
        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <ul class="nav-links">
            <li><a href="/">Home</a></li>
            <li class="dropdown">
                <a href="#about">
                    About <span class="dropdown-icon">▼</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="/about-us">About Us</a></li>
                    <li><a href="/finer-foundation">FINER Foundation</a></li>
                    <li><a href="/directors-&-past-presidents">Directors & Past Presidents</a></li>
                </ul>
            </li>
            <li><a href="/under-construction">Initiative</a></li>
            <li class="dropdown">
                <a href="#events">
                    Events <span class="dropdown-icon">▼</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="/upcoming-events">Upcoming Events</a></li>
                    <li><a href="/past-events">Past Events</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#Knowledge">
                Knowledge <span class="dropdown-icon">▼</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="/magazines">Magazines</a></li>
                    <li><a href="/press-releases">Publications</a></li>
                </ul>
            </li>
            
            <li><a href="/under-construction">Gallery</a></li>
            <li><a href="/Contact-Us">Contact Us</a></li>
            <li><button class="conference-btn">Book Conference Hall</button></li>
            <li><button class="member-btn">Become a Member</button></li>
        </ul>
    </nav>

    <script>
        const nav = document.querySelector('.nav-container');
        const hamburger = document.querySelector('.hamburger');
        const navLinks = document.querySelector('.nav-links');
        const dropdowns = document.querySelectorAll('.dropdown');
        let lastScrollY = window.scrollY;

        window.addEventListener('scroll', () => {
            const currentScrollY = window.scrollY;

            if (currentScrollY > lastScrollY) {
                nav.classList.add('hidden');
            } else {
                nav.classList.remove('hidden');
            }

            lastScrollY = currentScrollY;
        });

        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });

        dropdowns.forEach(dropdown => {
            dropdown.addEventListener('click', (e) => {
                if (window.innerWidth <= 768) {
                    e.preventDefault();
                    dropdown.classList.toggle('active');
                }
            });
        });

        document.querySelector('.conference-btn').addEventListener('click', function() {
            window.location.href = '/Book_conference_hall';
        });

        const memberButton = document.querySelector('.member-btn');
        memberButton.addEventListener('click', () => {
            window.location.href = '/become-a-member';
        });

        window.addEventListener('resize', () => {
            if (window.innerWidth > 768) {
                navLinks.classList.remove('active');
                dropdowns.forEach(dropdown => dropdown.classList.remove('active'));
            }
        });
    </script>
</body>
</html>