@section('title', 'Preloader')

@push('styles')
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .animate-fade-in {
            animation: fadeIn 1s ease-in-out;
        }

        #top-door,
        #bottom-door,
        #logo {
            transition: all 1s ease-in-out;
        }

        #logo.move-to-nav {
            transform: translate(calc(-50vw + 2rem), calc(-50vh + 2rem)) scale(0.75);
            z-index: 1000;
        }

        #top-door.open {
            transform: translateY(-100%);
        }

        #bottom-door.open {
            transform: translateY(100%);
        }

        /* Slide-in effect for the home section */
        #home {
            transform: translateX(100%); /* Initially off-screen to the right */
            transition: transform 1s ease-in-out; /* Smooth transition */
        }

        #home.show {
            transform: translateX(0); /* Moves the section into view */
        }

        /* Slide-in effect for the navbar */
        #navbar {
            transform: translateX(-100%); /* Initially off-screen to the left */
            transition: transform 1s ease-in-out; /* Smooth transition */
        }

        #navbar.show {
            transform: translateX(0); /* Moves the navbar into view */
        }

    </style>
    @endpush
@section('content')
<body class="h-screen w-screen overflow-hidden">
    <div id="preloader" class="fixed inset-0 z-50 flex items-center justify-center bg-black">
        <div id="top-door" class="absolute inset-0 bg-gray-800"></div>
        <div id="bottom-door" class="absolute inset-0 bg-gray-600"></div>
        <div id="logo" class="absolute flex items-center justify-center rounded-full z-1000">
            <img src="https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExcmQwaDI3MzdsZWdjejlvYTNsZWNpbXQ5ZDkzNHpkZmZqZmh2eXY2ZiZlcD12MV9naWZzX3NlYXJjaCZjdD1n/OU2rWcRfrAmSchUv70/giphy.gif" 
                 alt="Logo" class="w-32 h-32 object-cover">
        </div>
    </div>
    @endsection
    @push('scripts')
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const preloader = document.getElementById('preloader');
            const topDoor = document.getElementById('top-door');
            const bottomDoor = document.getElementById('bottom-door');
            const logo = document.getElementById('logo');
            const home = document.getElementById('home');
            const navbar = document.getElementById('navbar');

            setTimeout(() => {
                // Open the doors
                topDoor.classList.add('open');
                bottomDoor.classList.add('open');

                setTimeout(() => {
                    // Move the logo
                    logo.classList.add('move-to-nav');
                }, 500);

                setTimeout(() => {
                    // Show the home section by adding the 'show' class
                    home.classList.add('show');
                }, 1500); // Adjust delay as needed

                setTimeout(() => {
                    // Show the navbar by adding the 'show' class
                    navbar.classList.add('show');
                }, 1500); // Adjust delay to sync with home section animation

                setTimeout(() => {
                    // Hide preloader
                    preloader.style.display = 'none';

                    // Adjust the logo after preloader
                    logo.style.position = 'fixed';
                    logo.style.top = '1rem';
                    logo.style.left = '1rem';
                    logo.style.zIndex = '60';
                }, 2000); // Adjust delay if necessary
            }, 3000); // Preloader duration
        });
    </script>
    @endpush
