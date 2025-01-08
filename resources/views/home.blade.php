@extends('layouts.app')

@section('title', 'Home')

@push('styles')

<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div id="homepage">

        <!-- Hero Section -->
        <section class="hero">
            <div class="container">
                <main class="main-content">
                    <!-- Hero Section -->
                    <section class="hero" id="heroSection">
                        <div class="heroheader">
                            <h1>Lorem ipsum dolor sit<br>amet consectetur.</h1>
                            <p>Lorem ipsum dolor sit amet consectetur. Excepteur sint occaecat cupidatat non proident.</p>
                            <div class="image-gallery-container" id="imageGalleryContainer">
                                <div class="image-gallery" id="imageGallery">
                                    <img src="assests/hero_1.jpg" alt="Gallery image 1" class="gallery-image">
                                    <img src="assests/hero_2.jpg" alt="Gallery image 2" class="gallery-image">
                                    <img src="assests/hero_3.jpg" alt="Gallery image 3" class="gallery-image">
                                    <img src="assests/hero_4.jpg" alt="Gallery image 4" class="gallery-image">
                                    <img src="assests/hero_5.jpg" alt="Gallery image 5" class="gallery-image">
                                    <img src="assests/hero_6.jpg" alt="Gallery image 6" class="gallery-image">
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
                        <div class="count-icon">👥</div>
                        <div class="count-stat-content">
                            <div class="count-number" data-target="400">0</div>
                            <div class="count-label">Total Members</div>
                        </div>
                    </div>
                    
                    <div class="count-stat-item">
                        <div class="count-icon">🏆</div>
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
                    <h2>// About Us</h2>
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
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z"/>
                        </svg>
                    </div>
                    <h4 class="sticky-header3">Policy Advocacy</h4>
                    <p>Engages with policymakers to create a favorable business environment.</p>
                </div>


                    <div class="sticky-card">
                        <div class="sticky-card-icon"></div>
                        <h4 class="sticky-header3">Trade and Networking</h4>
                        <p>
                            Connects industries with key stakeholders and market opportunities.
                        </p>
                    </div>

                    <div class="sticky-card">
                        <div class="sticky-card-icon"></div>
                        <h4 class="sticky-header3">Capacity Building</h4>
                        <p>Organizes training and workshops to enhance industrial skills</p>
                    </div>

                    <div class="sticky-card">
                        <div class="sticky-card-icon"></div>
                        <h4 class="sticky-header3">Sustainable Growth</h4>
                        <p>Promote eco-friendly pratices and inclusive development.</p>
                    </div>

                    <div class="sticky-card">
                        <div class="sticky-card-icon"></div>
                        <h4 class="sticky-header3">Economic Empowerment</h4>
                        <p>Supports entrepreneurship and skill-based livelihoods.</p>
                    </div>

                    <div class="sticky-card">
                        <div class="sticky-card-icon"></div>
                        <h4 class="sticky-header3">Social Upliftment</h4>
                        <p>Drives initiatives for improved living standards.</p>
                    </div>

                    <div class="sticky-card">
                        <div class="sticky-card-icon"></div>
                        <h4 class="sticky-header3">Environmental Conservation</h4>
                        <p>Advocates for clean energy and biodiversity protection.</p>
                    </div>

                    <div class="sticky-card">
                        <div class="sticky-card-icon"></div>
                        <h4 class="sticky-header3">Heritage Preservation</h4>
                        <p>Safeguards the region’s cultural legacy.</p>
                    </div>

                    <div class="sticky-card">
                        <div class="sticky-card-icon">
                 
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
                                    <svg class="vision-card-icon" viewBox="0 0 24 24" fill="none" stroke="#FFA500" stroke-width="2">
                                        <circle cx="12" cy="12" r="10"/>
                                        <path d="M12 8l4 4m0 0l-4 4m4-4H8"/>
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
                                        <img src="assests/visionGallery.png" alt="Initiative event 1">
                                    </div>
                                    <div class="vision-gallery-item">
                                        <img src="assests/visionGallery1.png" alt="Initiative event 2">
                                    </div>
                                    <div class="vision-gallery-item">
                                        <img src="assests/hero_7.jpg" alt="Initiative event 3">
                                    </div>
                                    <div class="vision-gallery-item">
                                        <img src="assests/hero_4.jpg" alt="Initiative event 4">
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
