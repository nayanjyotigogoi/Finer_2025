<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #7c3aed, #6d28d9);
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            color: white;
        }

        .logo {
            font-size: 2rem;
            font-weight: bold;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
        }

        .login-btn {
            border: 2px solid white;
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 80vh;
            color: white;
        }

        h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .signup-text {
            margin-bottom: 2rem;
        }

        .signup-text a {
            color: white;
            text-decoration: underline;
        }

        .login-form {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #e5e7eb;
            border-radius: 5px;
            font-size: 1rem;
        }

        .submit-btn {
            width: 100%;
            padding: 0.75rem;
            background: #7c3aed;
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-btn:hover {
            background: #6d28d9;
        }

        .error {
            color: #dc2626;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            display: none;
        }
    </style>
</head>
<body>
    <nav>
        <div class="logo">Finer</div>
        <div class="nav-links">
            <a href="/">HOME</a>
        </div>
    </nav>

    <div class="container">
    <!-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif -->
        <h1>Log In</h1>
        <p class="signup-text">You don't have a password? Then Please Contact Your Admin.</p>

        <form action="{{route('login')}}" method="post" class="login-form" id="loginForm">
            @csrf
            <div class="form-group">
                <input type="email" name="email" id="email" placeholder="Email" required>
                <!-- <div class="error" id="emailError">Please enter a valid email address</div> -->
                 @error('email')
                    <div class="invalid-feedback" style="color:red;" >{{ $message }}</div>
                 @enderror
            </div>
            <div class="form-group">
                <input type="password" name="password" id="password" placeholder="Password" required>
                <!-- <div class="error" id="passwordError">Password must be at least 6 characters</div> -->
                 <!-- @error('password')
                    <div class="invalid-feedback" style="color:red;" >{{ $message }}</div>
                 @enderror -->
            </div>
            <button type="submit" class="submit-btn">LOG IN</button>
        </form>
    </div>

    <script>
        // document.getElementById('loginForm').addEventListener('submit', function(e) {
        //     e.preventDefault();
            
        //     const email = document.getElementById('email');
        //     const password = document.getElementById('password');
        //     const emailError = document.getElementById('emailError');
        //     const passwordError = document.getElementById('passwordError');
            
        //     // Reset errors
        //     emailError.style.display = 'none';
        //     passwordError.style.display = 'none';
            
        //     // Validate email
        //     const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        //     if (!emailPattern.test(email.value)) {
        //         emailError.style.display = 'block';
        //         return;
        //     }
            
        //     // Validate password
        //     if (password.value.length < 6) {
        //         passwordError.style.display = 'block';
        //         return;
        //     }
            
        //     // If validation passes, you can submit the form to your backend
        //     console.log('Form submitted:', {
        //         email: email.value,
        //         password: password.value
        //     });
        // });
    </script>
</body>
</html>