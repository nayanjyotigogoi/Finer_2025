<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Under Construction - 3D</title>
    <script async src="https://unpkg.com/es-module-shims/dist/es-module-shims.js"></script>
    <script type="importmap">
    {
        "imports": {
            "three": "https://unpkg.com/three@0.159.0/build/three.module.js",
            "three/addons/": "https://unpkg.com/three@0.159.0/examples/jsm/"
        }
    }
    </script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        body {
            min-height: 100vh;
            background-color: #fff;
        }

        #canvas-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            z-index: 1;
            pointer-events: none;
        }

        .container {
            position: relative;
            z-index: 2;
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .header {
            display: flex;
            justify-content: flex-end;
            gap: 20px;
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 3;
        }

        .header button {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1.2rem;
            color: #666;
        }

        .content {
            text-align: center;
            margin-bottom: 40px;
        }

        .text-content h1 {
            font-size: 2.5rem;
            color: #2d4356;
            margin-bottom: 20px;
        }

        .text-content p {
            color: #666;
            margin-bottom: 30px;
            font-size: 1.1rem;
        }

        .subscribe-form {
            display: flex;
            gap: 10px;
            max-width: 400px;
            margin: 0 auto;
        }

        .subscribe-form input {
            flex: 1;
            padding: 12px 20px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 1rem;
        }

        .subscribe-form button {
            padding: 12px 24px;
            background-color: #1a73e8;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        .subscribe-form button:hover {
            background-color: #1557b0;
        }

        .countdown {
            margin-top: 60px;
        }

        .countdown h2 {
            color: #666;
            font-size: 1.5rem;
            margin-bottom: 20px;
            text-align: center;
        }       

        .countdown-timer {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .countdown-item {
            text-align: center;
        }

        .countdown-number {
            font-size: 2.5rem;
            color: #2d4356;
            font-weight: bold;
        }

        .countdown-label {
            color: #666;
            font-size: 0.9rem;
            text-transform: uppercase;
        }

        .separator {
            font-size: 2.5rem;
            color: #2d4356;
            margin-top: -10px;
        }

        @media (max-width: 768px) {
            .content {
                flex-direction: column;
                text-align: center;
            }

            .countdown-timer {
                flex-wrap: wrap;
            }

            .subscribe-form {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div id="canvas-container"></div>
    <div class="container">
        <div class="content">
            <div class="text-content">
                <h1>Under construction</h1>
                <p>This page is under construction, but we are ready<br>to go!</p>
                <form class="subscribe-form">
                    <input type="email" placeholder="Your email" required>
                    <button type="submit">Subscribe</button>
                </form>
            </div>
        </div>

        <div class="countdown">
        <h2>WE ARE LIVE IN</h2>
            <div class="countdown-timer">
                <div class="countdown-item">
                    <div class="countdown-number" id="days">3</div>
                    <div class="countdown-label">Days</div>
                </div>
                <div class="separator">:</div>
                <div class="countdown-item">
                    <div class="countdown-number" id="hours">17</div>
                    <div class="countdown-label">Hours</div>
                </div>
                <div class="separator">:</div>
                <div class="countdown-item">
                    <div class="countdown-number" id="minutes">32</div>
                    <div class="countdown-label">Minutes</div>
                </div>
                <div class="separator">:</div>
                <div class="countdown-item">
                    <div class="countdown-number" id="seconds">15</div>
                    <div class="countdown-label">Seconds</div>
                </div>
            </div>
        </div>
    </div>
    <script type="module">
        import * as THREE from 'three';
        import { GLTFLoader } from 'three/addons/loaders/GLTFLoader.js';
        import { OrbitControls } from 'three/addons/controls/OrbitControls.js';

        // Scene setup
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
        const container = document.getElementById('canvas-container');
        renderer.setSize(window.innerWidth, window.innerHeight);
        container.appendChild(renderer.domElement);

        // Lights
        const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);
        scene.add(ambientLight);
        const directionalLight = new THREE.DirectionalLight(0xffffff, 1);
        directionalLight.position.set(5, 5, 5);
        scene.add(directionalLight);

        // Camera position
        camera.position.z = 5;
        camera.position.y = 2;

        // Controls
        const controls = new OrbitControls(camera, renderer.domElement);
        controls.enableDamping = true;
        controls.dampingFactor = 0.05;
        controls.enableZoom = false;
        controls.autoRotate = true;
        controls.autoRotateSpeed = 3;

        // Load 3D Model
        const loader = new GLTFLoader();
        let duck;
        loader.load('/assets/3d/duck.glb', (gltf) => {
            duck = gltf.scene;
            duck.scale.set(2, 2, 2);
            duck.position.y = -1;
            scene.add(duck);

            // Add construction hat
            const hatGeometry = new THREE.ConeGeometry(0.5, 0.7, 32);
            const hatMaterial = new THREE.MeshPhongMaterial({ color: 0xFFD700 });
            const hat = new THREE.Mesh(hatGeometry, hatMaterial);
            hat.position.set(0, 0.8, 0);
            duck.add(hat);
        });

        // Animation
        function animate() {
            requestAnimationFrame(animate);
            controls.update();
            renderer.render(scene, camera);
        }
        animate();

        // Handle window resize
        window.addEventListener('resize', onWindowResize, false);
        function onWindowResize() {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        }

        // Countdown Timer
        const countDownDate = new Date().getTime() + 
            (30 * 24 * 60 * 60 * 1000) + // 30 days
            (17 * 60 * 60 * 1000) + // 17 hours
            (32 * 60 * 1000) + // 32 minutes
            (15 * 1000); // 15 seconds

        const countdown = setInterval(function() {
            const now = new Date().getTime();
            const distance = countDownDate - now;

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("days").textContent = String(days).padStart(2, '0');
            document.getElementById("hours").textContent = String(hours).padStart(2, '0');
            document.getElementById("minutes").textContent = String(minutes).padStart(2, '0');
            document.getElementById("seconds").textContent = String(seconds).padStart(2, '0');

            if (distance < 0) {
                clearInterval(countdown);
                document.querySelector(".countdown-timer").innerHTML = "EXPIRED";
            }
        }, 1000);

        // Form submission
        document.querySelector('.subscribe-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('input[type="email"]').value;
            alert(`Thank you for subscribing with: ${email}`);
            this.reset();
        });
    </script>
</body>
</html>