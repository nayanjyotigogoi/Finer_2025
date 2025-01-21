<!DOCTYPE html>
<html>
<head>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
body {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    /* font-size: small; */
}

.footer {
    background-color: #2f3178;
    color: white;
    padding: 40px 80px;
    position: relative;
    overflow: hidden;
}

.footer-content {
    display: flex;
    justify-content: space-between;
    position: relative;
    z-index: 2;
}

.logo img {
    width: 120px;
}

.footer-section {
    margin-right: 40px;
}

.footer-section h3 {
    font-size: 18px;
    margin-bottom: 20px;
}

.footer-section ul {
    list-style: none;
    padding: 0;
}

.footer-section ul li {
    margin-bottom: 10px;
}

.footer-section ul li a {
    color: white;
    text-decoration: none;
    opacity: 0.8;
}

.social-icons {
    display: flex;
    gap: 20px;
}

.social-icons a {
    color: white;
    font-size: 24px;
}


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
            <h3>About Us</h3>
            <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#">What We Do</a></li>
                <li><a href="#">Our Team Members</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="#">Initiatives</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">Knowledge Publications</a></li>
                <li><a href="#">Gallery</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h3>Contact Us</h3>
            <p>Supreme Tower, Lobby- A 2nd Floor, Walford, GS Road,<br>
            Guwahati, Assam-781005.</p>
            <p>Phone: +91-94355 55590</p>
        </div>

        <div class="footer-section">
            <h3>Social</h3>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>

    <div class="copyright">
        © 2019 | All Rights Reserved
    </div>
</footer>

<!-- Font Awesome for social icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</body>
</html>