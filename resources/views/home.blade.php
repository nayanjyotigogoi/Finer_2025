@extends('layouts.app')

@section('title', 'Home')

@push('styles')

<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div id="homepage">

        <!-- Hero Section -->
        <section class="hero">
            <div class="hero-container">
                <main class="main-content">
                    <!-- Hero Section -->
                    <section class="hero" id="heroSection">
                        <div class="heroheader">
                            <!-- Static Caption and Description -->
                            <h1>For A New Tomorrow</h1>
                            <p>Towards growth Entreprenuership <br> and Enterprise Development</p>

                            <div class="image-gallery-container" id="imageGalleryContainer">
                                <div class="image-gallery" id="imageGallery">
                                    <!-- Images will be dynamically injected by JavaScript -->
                                </div>
                            </div>
                        </div>
                    </section>
                </main>
            </div>
        </section>


        <!-- About Us Section -->
        <section class="about-us">
            <section class="about-section">
                <div class="image-container">
                    <div class="experience-badge">5+ Industry<br>
                    Experience</div>
                    <img src="assests/about_us1.jpg" alt="Business meeting" class="image-top" >
                    <img src="assests/about_us2.jpg" alt="Team collaboration" class="image-bottom">
                </div>

                <div class="content">
                    <h3 class="about-header">// About Us</h3>
                    <h1 class="about-title">Empowering Northeast industries through innovation, advocacy, collaboration, and sustainable growth for regional economic development.</h1>
                    <p class="about-text">
                        FINER (Federation of Industry & Commerce of North Eastern Region) stands as the premier and oldest apex business association in the North East. Established in 1992 and headquartered in Guwahati, FINER boasts a diverse membership of over 400 members spanning various sectors, from large and mega enterprises to small and medium businesses.
                    </p>
                    <button class="read-more">Read More</button>
                </div>
            </section>
        </section>

        <!-- Count Section -->
        <section class="count-metrics-section">     
            <div class="count-overlay"></div>
            <div class="count-content">
                <h2 class="count-title">Bringing Together 400+ Members, 1000+ Events,<br>and Counting – Shaping a Thriving Future</h2>
                
                <div class="count-stats-container">
                    <div class="count-stat-item">
                        <div class="count-icon">
                            <!-- SVG for Members Icon (Group of People) -->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                <path d="M12 1C7.03 1 3 5.03 3 9s4.03 8 9 8 9-4.03 9-8-4.03-8-9-8zM12 15c-1.38 0-2.63-.56-3.54-1.46A5.97 5.97 0 0 1 12 12c1.38 0 2.63.56 3.54 1.46A5.97 5.97 0 0 1 12 15zM18.92 10.93a7.98 7.98 0 0 1 0-1.86A7.97 7.97 0 0 0 12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10c0-.69-.11-1.34-.29-1.93z"/>
                            </svg>
                        </div>
                        <div class="count-stat-content">
                            <div class="count-number" data-target="400">0</div>
                            <div class="count-label">Total Members</div>
                        </div>
                    </div>
                    
                    <div class="count-stat-item">
                        <div class="count-icon">
                            <!-- SVG for Event Completed Icon (Calendar with Checkmark) -->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar-check">
                                <path d="M19 3h-4V1h-6v2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2zM5 19V8h14v11H5zm8-7l-4 4-2-2 6-6 4 4-2 2z"/>
                            </svg>
                        </div>
                        <div class="count-stat-content">
                            <div class="count-number" data-target="1000">0</div>
                            <div class="count-label">Event Completed</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- sticky Section -->
        <section class="sticky-section">
            <div class="sticky-container">
                <div class="sticky-background-pattern">
                    <div class="sticky-half-circle" id="sticky-halfCircle"></div>
                </div>

                <section class="sticky-vision-section">
                    <h2>// Services</h2>
                    <h3 class="sticky-header3">Empowering Northeast India: Growth, Innovation, Sustainability</h3>
                    <p>
                        FINER is a premier industry association dedicated to driving growth, policy advocacy, and sustainable development in Northeast India. Through its initiatives, it fosters industry collaboration, promotes eco-friendly practices, and empowers local communities for a prosperous future.
                    </p>
                    <a href="#" class="sticky-read-more">Read More</a>
                </section>

                <div class="sticky-cards-grid">
                <div class="sticky-card">
                    <div class="sticky-card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="36px" height="36px">
                        <path d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-4 6V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10c.55 0 1-.45 1-1z"/>
                        </svg>
                    </div>
                    <h4 class="sticky-header3">Policy Advocacy</h4>
                    <p>Engages with policymakers to create a favorable business environment.</p>
                </div>


                    <div class="sticky-card">
                        <div class="sticky-card-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z"/>
                        </svg>
                        </div>
                        <h4 class="sticky-header3">Trade and Networking</h4>
                        <p>
                            Connects industries with key stakeholders and market opportunities.
                        </p>
                    </div>

                    <div class="sticky-card">
                        <div class="sticky-card-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14z"/>
                            <path d="M7 12h2v5H7zm4-3h2v8h-2zm4-3h2v11h-2z"/>
                        </svg>
                        </div>
                        <h4 class="sticky-header3">Capacity Building</h4>
                        <p>Organizes training and workshops to enhance industrial skills</p>
                    </div>

                    <div class="sticky-card">
                        <div class="sticky-card-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M3.5 18.5l6-6 4 4L22 6.92 20.59 5.5l-8.5 8.5-4-4L2.5 16.5l1 2z"/>
                        </svg>
                        </div>
                        <h4 class="sticky-header3">Sustainable Growth</h4>
                        <p>Promote eco-friendly pratices and inclusive development.</p>
                    </div>

                    <div class="sticky-card">
                        <div class="sticky-card-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z"/>
                        </svg>
                        </div>
                        <h4 class="sticky-header3">Economic Empowerment</h4>
                        <p>Supports entrepreneurship and skill-based livelihoods.</p>
                    </div>

                    <div class="sticky-card">
                        <div class="sticky-card-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                        </svg>
                        </div>
                        <h4 class="sticky-header3">Social Upliftment</h4>
                        <p>Drives initiatives for improved living standards.</p>
                    </div>

                    <div class="sticky-card">
                        <div class="sticky-card-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 22c4.97 0 9-4.03 9-9s-4.03-9-9-9-9 4.03-9 9 4.03 9 9 9zm0-16c3.87 0 7 3.13 7 7s-3.13 7-7 7-7-3.13-7-7 3.13-7 7-7zm-5.5 7c0-3.03 2.47-5.5 5.5-5.5s5.5 2.47 5.5 5.5-2.47 5.5-5.5 5.5-5.5-2.47-5.5-5.5z"/>
                        </svg>
                        </div>
                        <h4 class="sticky-header3">Environmental Conservation</h4>
                        <p>Advocates for clean energy and biodiversity protection.</p>
                    </div>

                    <div class="sticky-card">
                        <div class="sticky-card-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                        </svg>
                        </div>
                        <h4 class="sticky-header3">Heritage Preservation</h4>
                        <p>Safeguards the region’s cultural legacy.</p>
                    </div>

                    <div class="sticky-card">
                        <div class="sticky-card-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 5.99L19.53 19H4.47L12 5.99M12 2L1 21h22L12 2zm1 14h-2v2h2v-2zm0-6h-2v4h2v-4z"/>
                        </svg>
                        </div>
                        <h4 class="sticky-header3">Disaster Relief</h4>
                        <p>Provides swift response and rehabilitation during emergencies.</p>
                    </div>
                    
                </div>
            </div>
        </section>

        <!-- vision section -->
        <section class="vision-section">
                <div class="vision-container">
                    <!-- Top Section -->
                     <div class="vision-top-section">
                            <div class="vision-header">
                                <div class="vision-section-label">// Our Vision & Mission</div>
                                <h1 class="vision-title">
                                    Fostering Sustainable Growth, Empowering Communities, and Shaping Northeast India's Future
                                </h1>
                            </div>

                            <div class="vision-cards-container">
                                <div class="vision-card">
                                    <svg class="vision-card-icon" viewBox="0 0 24 24" fill="none" stroke="#FFA500" stroke-width="2">
                                        <path d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                                    </svg>
                                    
                                    <p class="vision-card-text">
                                        Our vision is to establish Northeast India as a hub for sustainable industrial growth, innovation, and inclusive development. We aim to create a thriving ecosystem where industries, communities, and the environment coexist harmoniously. Through collaboration, policy advocacy, and capacity building, we envision a prosperous future that enhances the region's global competitiveness while preserving its cultural heritage.
                                    </p>
                                </div>
                                <div class="vision-card">
    <svg class="vision-card-icon" viewBox="22 0 12 65" fill="none" stroke="#FFA500" stroke-width="2">
        <circle cx="12" cy="12" r="10" stroke="#FFA500" stroke-width="2" fill="none"/>
        <path d="m25.991 3.37.298-.003c2.227-.02 4.376.015 6.563.484l.356.075c1.553.34 3.043.798 4.515 1.398l.235.094a24 24 0 0 1 3.617 1.831l.236.141c.217.2.217.2.274.47v.695q-.014.847-.044 1.694-.012.442-.012.886c.004 1.57-.056 2.77-1.175 3.95-.458.435-.93.843-1.431 1.227a4 4 0 0 1-1.105-.623c-4.09-3.024-9.211-4.564-14.272-3.842-5.017.783-9.488 3.45-12.52 7.527-3.055 4.294-4.27 9.481-3.417 14.694.706 3.919 2.533 7.343 5.259 10.224l.264.282c3.622 3.757 8.77 5.508 13.896 5.609 5.027.02 9.755-2.139 13.367-5.55l.253-.235c3.173-3.044 5.354-7.686 5.543-12.084.04-3.607-.335-6.8-2.17-9.998q-.066-.112-.13-.228a16.3 16.3 0 0 0-1.984-2.744c-.24-.283-.42-.56-.605-.88.774-1.035 1.611-2.103 2.935-2.362.859-.101 1.716-.1 2.58-.095q.451-.007.904-.02 1.095-.022 2.19-.015a26 26 0 0 1 1.77 3.218c.9 1.93 1.526 3.875 1.968 5.958l.073.339c.712 3.457.666 7.316-.073 10.762l-.072.346c-1.285 6.047-4.821 11.876-9.783 15.627l-.194.148c-4.38 3.33-9.827 5.606-15.389 5.656l-.305.004c-2.258.02-4.438-.008-6.655-.484l-.346-.072c-6.032-1.281-11.896-4.817-15.627-9.783l-.166-.22c-2.533-3.364-4.283-7.1-5.158-11.222L.38 35.91c-.712-3.454-.67-7.318.073-10.762l.075-.355C2.07 17.73 6.4 11.72 12.353 7.696c4.05-2.576 8.803-4.28 13.638-4.325"/>
        <path d="M36.93 18.578c-.167.386-.382.636-.679.93l-.281.283-.305.3-.311.31q-.41.41-.82.814l-.835.832-1.64 1.629c-.429-.169-.84-.358-1.253-.56a8.37 8.37 0 0 0-6.455-.261c-2.25.947-3.857 2.467-4.817 4.71a8.46 8.46 0 0 0 .064 6.42c1.036 2.27 2.69 3.742 4.984 4.644 2.12.728 4.348.528 6.368-.393 2.2-1.112 3.625-2.864 4.401-5.177.536-1.953.45-4.187-.535-5.99q-.186-.32-.38-.632c-.112-.27-.112-.27-.035-.481.179-.287.383-.502.623-.74l.295-.295.32-.316.326-.326q.43-.428.86-.853l.877-.873 1.72-1.71c2.263 1.788 3.596 4.991 4.035 7.779.082.717.082 1.434.079 2.155l-.001.242c-.019 4.307-1.773 8.16-4.712 11.272a15 15 0 0 1-1.553 1.322l-.33.25c-2.864 2.073-6.043 3.06-9.568 3.064h-.263c-1.254-.002-2.44-.047-3.66-.368l-.225-.054a14.9 14.9 0 0 1-5.439-2.552l-.285-.214a25 25 0 0 1-.847-.692l-.33-.279c-.878-.763-1.599-1.608-2.276-2.553l-.137-.19c-1.53-2.174-2.557-4.745-2.808-7.4l-.023-.218c-.404-4.091.7-8.348 3.308-11.563a28 28 0 0 1 1.246-1.36l.238-.263c2.228-2.392 5.529-3.783 8.711-4.268l.292-.045c4.301-.534 8.683 1.042 12.056 3.67M51.54-.01c.336.181.588.433.855.702l.185.182.6.598.419.415.873.873q.56.56 1.124 1.116.432.428.861.859l.415.411q.29.287.576.577l.176.171c.372.382.372.382.388.68-.179.32-.406.545-.665.804l-.17.17q-.277.278-.557.554-.194.192-.387.386l-.81.806q-.522.517-1.041 1.035l-.799.796-.383.382-.536.532-.309.306c-.358.335-.568.361-1.047.387l-.363.021-.395.02-3.377.185-.39.021a27 27 0 0 1-1.81.05 274 274 0 0 1 .124-3.085q.035-.803.075-1.606l.025-.53q.016-.378.037-.754l.02-.44c.102-.671.483-1.063.95-1.535l.165-.168.54-.544.376-.38.788-.791q.506-.508 1.008-1.018.388-.393.777-.782.187-.187.372-.375.258-.264.52-.522l.3-.3c.266-.198.266-.198.49-.209"/>
        <path d="M29.567 26.054c-.626.764-1.324 1.451-2.025 2.146l-.367.365q-.446.445-.893.888a22 22 0 0 0 1.459 1.579l.694.686c.763-.625 1.45-1.324 2.145-2.024l1.253-1.26c.574.527.62 1.29.675 2.036.023 1.602-.545 2.907-1.647 4.059-1.034.936-2.287 1.377-3.673 1.38-1.6-.09-2.89-.738-3.964-1.925-.922-1.24-1.248-2.6-1.07-4.128.256-1.418 1.02-2.644 2.202-3.474.582-.352 1.14-.654 1.813-.78l.215-.046c1.055-.176 2.252-.022 3.183.498"/>
    </svg>
    <p class="vision-card-text">
        Our aim is to drive industrial growth, promote sustainable development, and empower local communities in Northeast India. We strive to create a business-friendly environment, enhance industry collaboration, and encourage eco-friendly practices. Through capacity building, advocacy, and community engagement, we aim to position the region as a leading economic hub while preserving its unique cultural and environmental heritage.
    </p>
</div>

                            </div>
                        </div>

                        <!-- Center Image -->
                     
                        <img src="assests/visionCenter.png" alt="Group photo"class="vision-center-image">
                     
                        

                        <!-- Bottom Section -->
                    <div class="vision-bottom-section">
                            <div class="vision-initiatives-content">
                                <h2 class="vision-initiatives-title">Our Initiatives</h2>
                                <p class="vision-vision-initiatives-text">
                                    Our initiatives focus on driving industrial growth, fostering collaboration, and promoting sustainability in Northeast India. We support businesses through policy advocacy, create market opportunities, and provide capacity-building programs to empower local communities. Additionally, we champion eco-friendly practices, entrepreneurship, and the preservation of the region’s cultural heritage, ensuring inclusive and sustainable development.
                                </p>
                            </div>

                            <div class="vision-gallery-container">
                                <div class="vision-gallery">

                                    <div class="vision-gallery-item">
                                        <img src="assests/initiatives_1.jpg" alt="Initiative event 1">
                                    </div>
                                    <div class="vision-gallery-item">
                                        <img src="assests/initiatives_2.jpg" alt="Initiative event 2">
                                    </div>
                                    <div class="vision-gallery-item">
                                        <img src="assests/initiatives_3.jpg" alt="Initiative event 4">
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                
        </section>
            

        <!-- banner section -->

        <section class="banner-container">
            <div class="banner-header-section">
                <div class="banner-upcoming-label">// Upcoming Events</div>
                <h1 class="banner-main-title">Be Part of the Future</h1>
                <h2 class="banner-sub-title">Explore Our Upcoming Events</h2>
                <p class="banner-description">
                    Discover new opportunities, connect with industry leaders, and stay ahead of trends. Our upcoming events are designed to inspire growth and collaboration across Northeast India.
                </p>
            </div>

            <div class="banner">
                @if($banners->isNotEmpty())
                <!-- Display the first active banner's image -->
                <img src="{{ asset('storage/' . $banners->first()) }}" alt="Banner Image"> 
                @else
                    <!-- Fallback: Default banner image -->
                    <img src="assests/banner_2.png" alt="Default Banner Image">
                @endif
            </div>
        </section>


        <!-- Events Section -->
        <section class="event-section">
            <div class="event-container">
                <!-- Upcoming Events -->
                <section class="event-upcoming-events">
                    <h2 class="event-section-title">// More Upcoming Events</h2>

                    @foreach($upcomingEvents as $event)
                        <div class="event-main-event-card active">
                            <div class="event-date-badge">
                                <span class="event-month">{{ \Carbon\Carbon::parse($event->event_date)->format('M') }}</span>
                                <span class="event-day">{{ \Carbon\Carbon::parse($event->event_date)->format('d') }}</span>
                            </div>
                            <img src="{{ asset('storage/' . $event->image) }}" alt="Event" class="event-event-image">
                            <div class="event-event-content">
                                <h3 class="event-event-title">{{ $event->title }}</h3>
                                <p class="event-event-description">
                                    {{ $event->description }}
                                </p>
                            </div>
                        </div>
                    @endforeach

                    <div class="event-dots">
                        @foreach($upcomingEvents as $event)
                            <span class="event-dot"></span>
                        @endforeach
                    </div>
                </section>

                <!-- Past Events -->
                <section class="event-past-events">
                    <h2 class="event-section-title">// Past Events</h2>

                    @foreach($pastEvents as $event)
                        <div class="event-past-event-card">
                            <img src="{{ asset('storage/' . $event->image) }}" alt="Past Event" class="event-past-event-image">
                            <div class="event-past-event-content">
                                <h3 class="event-event-title">{{ $event->title }}</h3>
                                <p class="event-event-description">
                                    {{ $event->description }}
                                </p>
                            </div>
                        </div>
                    @endforeach

                    <a href="#" class="event-see-all">See All</a>
                </section>
            </div>
        </section>

        <!-- Board Of Director section -->
        <section class="BOD-section">
            <!-- Background Shapes -->
            <div class="BOD-shape BOD-shape-1"></div>
            <div class="BOD-shape BOD-shape-2"></div>

            <div class="BOD-container">
                <div class="BOD-section-title">// Our Board of Directors</div>
                <h1 class="BOD-main-title">Meet the Visionaries <br>
                Leading Our Path to Growth and Innovation</h1>
                <p class="BOD-description">Our Board of Directors brings expertise, innovation, and a shared commitment to driving progress. Together, they shape the future of Northeast India through strategic leadership and collaboration.</p>
                
                <div class="BOD-carousel">
                    <button class="BOD-nav-button BOD-prev">❮</button>
                    <button class="BOD-nav-button BOD-next">❯</button>
                    <div class="BOD-carousel-container" id="BOD-data-container">
                        <!-- Cards will be dynamically inserted here by JavaScript -->
                    </div>
                </div>
            </div>
        </section>



       <!-- blog section -->
       <section class="blog-section">
            <div class="blog-container">
                <div class="blog-post-container">
                    <span class="blog-section-label">//Press Release</span>
                    <div class="blog-post-wrapper">
                        <!-- Blog Posts -->
                        @foreach($pressReleases as $pressRelease)
                            <div class="blog-post">
                                @if($pressRelease->image)
                                    <img src="{{ asset('storage/' . $pressRelease->image) }}" alt="Blog image">
                                @else
                                    <img src="{{ asset('default-placeholder.jpg') }}" alt="Default image">
                                @endif
                                <h3 class="blog-post-h3">{{ $pressRelease->page_title }}</h3>
                                <p class="blog-post-p">{{ Str::limit($pressRelease->description, 100) }}</p>
                                @if($pressRelease->pdf)
                                    <a href="{{ asset('storage/' . $pressRelease->pdf) }}" download class="download-button">Download PDF</a>
                                @else
                                    <span>No PDF available</span>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
                <a class="twitter-timeline" data-width="450" data-height="500" href="https://twitter.com/XDevelopers?ref_src=twsrc%5Etfw">Tweets by XDevelopers</a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
            <div class="blog-nav">
                <span class="blog-dot active"></span>
                <span class="blog-dot"></span>
                <span class="blog-dot"></span>
            </div>
       </section>
    </div>
 
@endsection

@push('scripts')
<script>   const directorsData = @json($directors); </script>
<script src="{{ asset('js/home.js') }}"></script>
@endpush
