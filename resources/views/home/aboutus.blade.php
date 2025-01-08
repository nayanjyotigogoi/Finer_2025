<!-- Aboutus -->
@section('title', ' About Us ')    
  <!-- <title>About Us Section</title> -->
@push('styles')
    <style>
        /* * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        } */

        .about-section {
            display: flex;
            max-width: 1200px;
            margin: 0 auto;
            padding: 80px 80px;
            gap: 60px; /* Minimum gap between the image and content */
        }

        .content, .image-container {
            flex: 1 1 50%;
        }

        .content {
            padding-right: 20px; /* Adds right margin to the content */
        }

        .about-header {
            color: #FFA500;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .about-title {
            color: #1a1a4b;
            font-size: 32px;
            line-height: 1.4;
            margin-bottom: 20px;
        }

        .about-text {
            color: #666;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .read-more {
            background: #FFA500;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }

        .read-more:hover {
            background: #ff9100;
        }

        .image-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative; /* Allows child elements to use absolute positioning */
            width: 500px;
            height: 600px;
        }

        .image-top {
            position: absolute;
            top: 0;
            left: 0;
            width: 300px;
            height: 430px;
            object-fit: cover;
            border-radius: 10px;
            z-index: 1;
        }

        .image-bottom {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 300px;
            height: 330px;
            object-fit: cover;
            border-radius: 10px;
            border: 20px solid white; /* White border */
            /* box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); Shadow effect */
            z-index: 2;
        }

        .experience-badge {
            position: absolute; /* Places the badge relative to the container */
            left: 0;
            left: -40px;
            top: 60px; /* Moves the badge slightly above the container */
            background: #FFA500;
            color: white;
            padding: 25px 30px;
            border-radius: 8px;
            font-weight: bold;
            z-index: 3; /* Ensures the badge appears on top */
            animation: bounce 2s infinite, glow 2s infinite;
            opacity: 0.8;
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-15px);
            }
        }

        @keyframes glow {
            0%, 100% {
                box-shadow: 0 0 10px rgba(255, 165, 0, 0.5);
            }
            50% {
                box-shadow: 0 0 20px rgba(255, 165, 0, 0.8);
            }
        }

        @media (max-width: 1024px) {
            .about-section {
                flex-direction: column;
                align-items: center;
            }

            .content, .image-container {
                max-width: 100%;
                flex: 1 1 100%;
            }

            .image-container {
                width: 100%; /* Adjust to fit smaller screens */
                height: auto; /* Maintain proportionality */
            }

            .image-top, .image-bottom {
                position: static; /* Reset absolute positioning */
                width: 90%; /* Scale images down */
                margin: 10px auto;
            }

            .experience-badge {
                position: static; /* Reset badge positioning */
                margin-bottom: 20px;
            }
        }

        .about-section {
            display: flex;
            max-width: 1200px;
            margin: 0 auto;
            padding: 80px 80px;
            gap: 60px; /* Minimum gap between the image and content */
        }
    </style>
    @endpush
    @section('content')
    <section class="about-section">
        <div class="image-container">
            <div class="experience-badge">5+ Industry<br>
             Experience</div>
            <img src="assests/about1.jpg" alt="Business meeting" class="image-top" >
            <img src="assests/about2.jpg" alt="Team collaboration" class="image-bottom">
        </div>

        <div class="content">
            <h3 class="about-header">// About Us</h3>
            <h1 class="about-title">Lorem ipsum dolor sit amet consectetur. Lectus at aliquam nibh urna semper. Vitae</h1>
            <p class="about-text">
                FINER (Federation of Industry & Commerce of North Eastern Region) stands as the premier and oldest apex business association in the North East. Established in 1992 and headquartered in Guwahati, FINER boasts a diverse membership of over 400 members spanning various sectors, from large and mega enterprises to small and medium businesses.
            </p>
            <button class="read-more">Read More</button>
        </div>
    </section>
    @endsection