<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magazines</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        .header {
            background: linear-gradient(45deg, #000066, #000099);
            position: relative;
            height: 250px;
            overflow: hidden;
        }

        .wave-pattern {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://hebbkx1anhila5yf.public.blob.vercel-storage.com/new%20file%20(12).jpg-pmWy4wPOYaQDRE5vn4a5mZxowO3sIH.jpeg');
            background-size: cover;
            opacity: 0.1;
        }

        .header h1 {
            position: relative;
            color: white;
            text-align: center;
            padding-top: 100px;
            font-size: 2.5rem;
        }

        .press-release {
            color: #FF9900;
            padding: 20px;
            margin: 20px;
            font-size: 1.5rem;
        }

        .magazine-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .magazine-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .magazine-image {
            width: 100%;
            height: auto;
            border-radius: 4px;
        }

        .download-btn {
            background-color: #FF9900;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            margin-top: 10px;
            cursor: pointer;
            width: 100%;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }

        .download-btn:hover {
            background-color: #FF8800;
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin: 20px 0;
        }

        .pagination button {
            padding: 5px 10px;
            border: 1px solid #ddd;
            background: white;
            cursor: pointer;
        }

        .pagination button.active {
            background: #000;
            color: white;
        }

        @media (max-width: 768px) {
            .magazine-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .magazine-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="wave-pattern"></div>
        <h1>Magazines</h1>
    </header>

    <h2 class="press-release">Press Release</h2>

    <div class="magazine-grid">
        <!-- Repeated 6 times for the grid -->
        <div class="magazine-card">
            <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/new%20file%20(12).jpg-pmWy4wPOYaQDRE5vn4a5mZxowO3sIH.jpeg" alt="FINER News & Views" class="magazine-image">
            <a href="#" class="download-btn">↓ Download</a>
        </div>
        <div class="magazine-card">
            <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/new%20file%20(12).jpg-pmWy4wPOYaQDRE5vn4a5mZxowO3sIH.jpeg" alt="FINER News & Views" class="magazine-image">
            <a href="#" class="download-btn">↓ Download</a>
        </div>
        <div class="magazine-card">
            <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/new%20file%20(12).jpg-pmWy4wPOYaQDRE5vn4a5mZxowO3sIH.jpeg" alt="FINER News & Views" class="magazine-image">
            <a href="#" class="download-btn">↓ Download</a>
        </div>
        <div class="magazine-card">
            <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/new%20file%20(12).jpg-pmWy4wPOYaQDRE5vn4a5mZxowO3sIH.jpeg" alt="FINER News & Views" class="magazine-image">
            <a href="#" class="download-btn">↓ Download</a>
        </div>
        <div class="magazine-card">
            <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/new%20file%20(12).jpg-pmWy4wPOYaQDRE5vn4a5mZxowO3sIH.jpeg" alt="FINER News & Views" class="magazine-image">
            <a href="#" class="download-btn">↓ Download</a>
        </div>
        <div class="magazine-card">
            <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/new%20file%20(12).jpg-pmWy4wPOYaQDRE5vn4a5mZxowO3sIH.jpeg" alt="FINER News & Views" class="magazine-image">
            <a href="#" class="download-btn">↓ Download</a>
        </div>
    </div>

    <div class="pagination">
        <button>← Back</button>
        <button>1</button>
        <button class="active">2</button>
        <button>3</button>
        <button>4</button>
        <button>5</button>
        <button>Next →</button>
    </div>

    <script>
        // Add click handlers for pagination
        document.querySelectorAll('.pagination button').forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                document.querySelectorAll('.pagination button').forEach(btn => {
                    btn.classList.remove('active');
                });
                // Add active class to clicked button if it's a number
                if (!this.textContent.includes('←') && !this.textContent.includes('→')) {
                    this.classList.add('active');
                }
            });
        });
    </script>
</body>
</html>