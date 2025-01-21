<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'finer')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
</head>
<body class="h-screen w-screen">
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
