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
            background-color: rgba(45, 51, 138, 0.8);
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 6px 40px;
            z-index: 1000;
            transition: transform 0.3s ease-in-out, background-color 0.3s ease-in-out;
        }

        .nav-container.hidden {
            transform: translateY(-100%);
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .nav-links li {
            position: relative;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: background-color 0.3s ease;
        }

        .nav-links a:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        /* Dropdown Styling */
        .dropdown-icon {
            font-size: 0.8em;
            transform: rotate(0deg);
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

        .logo-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo {
            width: 45px;
            height: 50px;
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
            <img src="assests/darkbackground_logo.png" alt="Logo" class="logo">
        </div>
        <ul class="nav-links">
            <li><a href="/">Home</a></li>
            <li class="dropdown">
                <a href="#about">
                    About <span class="dropdown-icon">▼</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ url('/about-us') }}">About Us</a></li>
                    <li><a href="{{ url('/finer-foundation')}}">Finer Foundation</a></li>
                    <li><a href="{{ url('/directors-&-past-presidents')}}">Directors & Past Presidents</a></li>
                </ul>
            </li>
            <li><a href="#initiative">Initiative</a></li>
            <li class="dropdown">
                <a href="#events">
                    Events <span class="dropdown-icon">▼</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ url('/upcoming-events') }}">Upcoming Events</a></li>
                    <li><a href="{{ url('/past-events')}}">Past Events</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#Knowledge">
                Knowledge <span class="dropdown-icon">▼</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{url('/magazines')}}">Magazines</a></li>
                </ul>
            </li>
            
            <li><a href="{{ url('/press-releases')}}">Publications</a></li>
            <li><a href="#gallery">Gallery</a></li>
            <li><a href="{{url('/Contact-Us')}}">Contact Us</a></li>
        </ul>
        <button class="member-btn">Become a Member</button>
    </nav>

    <script>
        const nav = document.querySelector('.nav-container');
        let lastScrollY = window.scrollY;

        window.addEventListener('scroll', () => {
            const currentScrollY = window.scrollY;

            if (currentScrollY > lastScrollY) {
                nav.classList.add('hidden'); // Hide on scroll down
            } else {
                nav.classList.remove('hidden'); // Show on scroll up
            }

            lastScrollY = currentScrollY;
        });

        // Redirect to Become a Member page on button click
        const memberButton = document.querySelector('.member-btn');
        memberButton.addEventListener('click', () => {
            window.location.href = '/become-a-member'; // Update with your actual route URL
        });
    </script>
</body>
</html>
