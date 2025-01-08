<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Website')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
</head>
<body class="h-screen w-screen">
    <!-- Preloader -->
    <div id="preloader">
        <div id="top-door"></div>
        <div id="bottom-door"></div>
        <div id="logo">
            <img src="{{ asset('images/logo.gif') }}" alt="Logo" class="w-32 h-32 object-cover">
        </div>
    </div>

    <!-- Navbar --> 
    @include('layouts.navbar')
    <!-- Main Content -->
    <main id="home">
        @yield('content')
    </main>
    
    <!-- Footer --> 
    @include('layouts.footer');

    @stack('scripts')
</body>
</html>
