<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
</head>
<body>

    <header>
        @include('partials.nav')

        @include('partials.header') 
    </header>
    
    <main>
        @yield('content')
    </main>

    {{-- <footer>
        @include('partials.footer')
    </footer> --}}

</body>
</html>
