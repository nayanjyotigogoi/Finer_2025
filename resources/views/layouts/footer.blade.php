<!DOCTYPE html>
<html>
<head>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
body {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
}

.footer {
    background-color: #2f3178;
    color: white;
    padding: 40px 80px;
    position: relative;
    overflow: hidden;
    margin-bottom: -20px;
}

.footer-content {
    display: flex;
    flex-wrap: wrap; /* Enables stacking on small screens */
    justify-content: space-between;
    gap: 20px;
    position: relative;
    z-index: 2;
}

.footer-section {
    flex: 1;
    min-width: 80px; /* Prevent sections from shrinking too much */
    margin-bottom: 20px;
}

.footer-section-address h3{
    font-size: 18px;
    margin-bottom: 20px;
}

.footer-section-address p{

    font-size: 14px;
    color: white;
    opacity: 0.8;
}
.footer-section h3 {
    font-size: 18px;
    margin-bottom: 20px;
}

.footer-section ul {
    list-style: none;
    padding: 0;
}

.footer-section ul ul {
    list-style-type: none;
    padding-left: 20px; /* Indentation for sublinks */
    display: none; /* Hide submenus by default */
}

.footer-section ul li {
    margin: 10px 0;
}

.footer-section ul ul li {
    margin: 5px 0;
}

.footer-section ul li a {
    color: white;
    text-decoration: none;
    opacity: 0.8;
}

.footer-section ul li a:hover {
    color: #FFA500; /* Optional: color change on hover */
}

/* Show submenu when hovering over the parent link */
.footer-section ul li:hover > .submenu {
    display: block; /* Show the submenu on hover */
}

/* Social icons styling */
.social-icons {
    display: flex;
    gap: 20px;
}

.social-icons a {
    color: white;
    font-size: 24px;
}

/* Other styles */
.copyright::before {
    content: '';
    display: block;
    width: 100%;
    height: 1px;
    background-color: #ffffff33;
    margin-bottom: 20px; /* Space between the line and the copyright text */
}

.copyright {
    margin-top: 40px;
    text-align: center;
    opacity: 0.8;
    position: relative;
    z-index: 2;
}

/* Decorative shapes */
.shape {
    position: absolute;
    border: 2px solid rgba(255, 255, 255, 0.1);
    border-radius: 50%;
}

.shape-1 {
    width: 400px;
    height: 400px;
    bottom: -200px;
    left: -200px;
}

.shape-2 {
    width: 300px;
    height: 300px;
    bottom: -150px;
    left: -150px;
}

.shape-3 {
    width: 400px;
    height: 400px;
    bottom: -200px;
    right: -200px;
}

.shape-4 {
    width: 300px;
    height: 300px;
    bottom: -150px;
    right: -150px;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .footer-content {
        flex-direction: column;
        align-items: center; /* Center-align sections */
    }

    .footer-section {
        text-align: center;
    }

    .footer-section ul ul {
        position: relative; /* Make submenus inline for smaller screens */
        padding-left: 0;
        box-shadow: none;
        background-color: transparent;
    }

    .footer-section ul li:hover > ul {
        display: block; /* Always show submenu on hover for mobile-friendly behavior */
    }

    .social-icons {
        justify-content: center; /* Center-align social icons */
    }
}
</style>
</head>
<body>

<footer class="footer">
    <!-- Decorative shapes -->
    <div class="shape shape-1"></div>
    <div class="shape shape-2"></div>
    <div class="shape shape-3"></div>
    <div class="shape shape-4"></div>

    <div class="footer-content">
        <div class="footer-section logo">
            <img src="assests/darkbackground_logo.png" alt="FINER Logo">
        </div>

        <div class="footer-section">
            <h3>About</h3>
            <ul>
                <li><a href="{{ url('/about-us') }}">About Us</a></li>
                <li><a href="{{ url('/finer-foundation')}}">FINER Foundation</a></li>
                <li><a href="{{ url('/directors-&-past-presidents')}}">Directors & Past Presidents</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="#">Initiatives</a></li>

                <!-- Events Section -->
                <li><a href="#">Events</a>
                    <ul class="submenu">
                        <li><a href="{{ url('/upcoming-events') }}">Upcoming Events</a></li>
                        <li><a href="{{ url('/past-events')}}">Past Events</a></li>
                    </ul>
                </li>

                <!-- Knowledge Section -->
                <li><a href="#">Knowledge</a>
                    <ul class="submenu">
                        <li><a href="{{url('/magazines')}}">Magazines</a></li>
                        <li><a href="{{ url('/press-releases')}}">Publications</a></li>
                    </ul>
                </li>

                
                <li><a href="#">Gallery</a></li>
            </ul>
        </div>


        <div class="footer-section-address">
            <h3>Contact Us</h3>
            <p>Supreme Tower, Lobby- A 2nd Floor, Walford, GS Road,<br>
            Guwahati, Assam-781005.</p>
            <p>Phone: +91-94355 55590</p>
        </div>

        <div class="footer-section">
            <h3>Social</h3>
            <div class="social-icons">
                <a href="https://www.facebook.com/profile.php?id=61560848374018" target="_blank">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://linkedin.com/in/federation-of-industry-and-commerce-of-north-eastern-region-finer-a4343550" target="_blank">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="https://x.com/FINERIndia" target="_blank">
                    <i class="fas fa-times"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="copyright">
        © 2025 | All Rights Reserved |
        Crafted by <a href="http://indigiconsulting.com./" style="color: #FFA500;">Indigi Consulting and Solutions Pvt Ltd</a>
    </div>
</footer>

<!-- Font Awesome for social icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</body>
</html>