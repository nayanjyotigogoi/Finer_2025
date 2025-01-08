<!-- home-image section -->
@section('title', 'main')

    <!-- <title>Modern Website</title> -->
    @push('styles')
    <style>
        /* * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        } */

        /* body {
            background-color: #f4f4f4;
            color: #333;
        } */

        .container {
            display: flex;
            min-height: 100%;
            flex-direction: row;
        }

        /* .sidebar {
            width: 250px;
            background-color: #2a2a72;
            padding: 2rem 0;
            position: fixed;
            height: 100vh;
            transition: left 0.3s;
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 1rem 2rem;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: rgba(255, 255, 255, 0.1);
        } */

        .main-content {
            margin-left: 250px;
            flex: 1;
            position: relative;
            /* padding: 2rem; */
        }

        .hero {
            position: relative;
            height: 100vh;
            background: url('https://via.placeholder.com/1920x1080') center/cover;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 2rem;
            color: white;
            transition: background 1s ease-in-out;
            /* animation: slideFromRight 1s ease-out forwards; Apply the animation */
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .hero p {
            font-size: 1rem;
            max-width: 400px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        .image-gallery-container {
            position: absolute;
            bottom: 2rem;
            right: 0;
            width: 50%;
            overflow-x: auto;
            padding: 0 1rem;
            display: flex;
            justify-content: start;
        }

        .image-gallery-container::-webkit-scrollbar {
            display: none; /* Chrome, Safari, and Edge */
        }

        .image-gallery {
            display: flex;
            gap: 1rem;
            transition: transform 0.3s ease;
        }

        .gallery-image {
            width: 200px;
            height: 150px;
            object-fit: cover;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .gallery-image.active {
            transform: scale(1.2);
            box-shadow: 0 8px 10px rgba(0, 0, 0, 0.2);
        }

        .mobile-menu {
            display: none;
            position: fixed;
            top: 1rem;
            left: 1rem;
            z-index: 100;
            background: white;
            padding: 0.5rem;
            border-radius: 4px;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .mobile-menu {
                display: block;
            }

            .sidebar {
                position: fixed;
                left: -250px;
                top: 0;
                height: 100vh;
                transition: left 0.3s;
            }

            .sidebar.active {
                left: 0;
            }

            .main-content {
                margin-left: 0;
            }

            .image-gallery-container {
                width: 100%;
            }
        }
    </style>
    @endpush
<!-- @section('content') -->


    <div class="mobile-menu" id="menuToggle">☰</div>
    <div class="container">
        <!-- Removed the navbar from here -->
        <!-- <nav class="sidebar" id="sidebar">
            <a href="#" style="color: #ffd700;">Home</a>
            <a href="#about">About Us</a>
            <a href="#events">Events</a>
            <a href="#knowledge">Knowledge</a>
            <a href="#gallery">Gallery</a>
            <a href="#contact">Contact Us</a>
        </nav> -->
        <main class="main-content">
            <!-- Hero Section -->
            <section class="hero" id="heroSection">
                <h1>Lorem ipsum dolor sit<br>amet consectetur.</h1>
                <p>Lorem ipsum dolor sit amet consectetur. Excepteur sint occaecat cupidatat non proident.</p>
                <div class="image-gallery-container" id="imageGalleryContainer">
                    <div class="image-gallery" id="imageGallery">
                        <img src="assests/2nd.jpg" alt="Gallery image 1" class="gallery-image">
                        <img src="assests/3rd.jpg" alt="Gallery image 2" class="gallery-image">
                        <img src="assests/First.jpg" alt="Gallery image 3" class="gallery-image">
                        <img src="assests/2nd.jpg" alt="Gallery image 1" class="gallery-image">
                        <img src="assests/3rd.jpg" alt="Gallery image 2" class="gallery-image">
                    </div>
                </div>
            </section>
        </main>
    </div>
    <!-- @endsection -->

    @push('scripts')

    <script>
        const galleryContainer = document.querySelector('.image-gallery-container');
        const galleryImages = document.querySelectorAll('.gallery-image');

        galleryContainer.addEventListener('scroll', () => {
            const containerCenter = galleryContainer.scrollLeft + galleryContainer.offsetWidth / 2;

            galleryImages.forEach((image) => {
                const imageCenter = image.offsetLeft + image.offsetWidth / 2;
                const distance = Math.abs(containerCenter - imageCenter);

                // Add 'focus' class to the image closest to the center
                if (distance < image.offsetWidth / 2) {
                    image.classList.add('focus');
                } else {
                    image.classList.remove('focus');
                }
            });
        });

        // Trigger the scroll event on page load to set the initial focus
        galleryContainer.dispatchEvent(new Event('scroll'));

    </script>
    @endpush

