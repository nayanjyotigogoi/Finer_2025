<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Website')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles') <!-- Add page-specific styles -->
    <style>
        /* Preloader Styles */
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #000; /* Background color */
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #top-door, #bottom-door {
            position: absolute;
            width: 100%;
            height: 50%;
            background-color: #333;
            transition: transform 1s ease-in-out;
        }

        #top-door { top: 0; transform: translateY(0); }
        #bottom-door { bottom: 0; transform: translateY(0); }

        #logo {
            position: absolute;
            z-index: 1000;
            transition: all 1s ease-in-out;
        }

        #logo.move-to-nav {
            transform: translate(calc(-50vw + 2rem), calc(-50vh + 2rem)) scale(0.75);
        }

        #top-door.open { transform: translateY(-100%); }
        #bottom-door.open { transform: translateY(100%); }

        #navbar { transform: translateX(-100%); transition: transform 1s ease-in-out; }
        #navbar.show { transform: translateX(0); }

        #home    { transform: translateX(100%); transition: transform 1s ease-in-out; }
        #home.show { transform: translateX(0); }
    </style>
</head>
<body class="h-screen w-screen overflow-hidden">
    <!-- Preloader -->
    <div id="preloader">
        <div id="top-door"></div>
        <div id="bottom-door"></div>
        <div id="logo">
            <img src="https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExcmQwaDI3MzdsZWdjejlvYTNsZWNpbXQ5ZDkzNHpkZmZqZmh2eXY2ZiZlcD12MV9naWZzX3NlYXJjaCZjdD1n/OU2rWcRfrAmSchUv70/giphy.gif" alt="Logo" class="w-32 h-32 object-cover">
        </div>
    </div>

    <!-- Navbar -->
    <nav id="navbar">
        @include('layouts.navbar') <!-- Include your navbar -->
    </nav>

    <!-- Main Content -->
    <main id="home">
        @yield('content') <!-- Render home or other sections -->
    </main>

    <script>
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
    </script>
    @stack('scripts') <!-- Add page-specific scripts -->
</body>
</html>
