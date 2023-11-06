<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title','Advanced Web Development')</title>
    </head>
    <body>
        {{-- This is how you write a comment in blade --}}
    
        @include('components.navbar')
    
        <main class="container mt-4">
            @yield('content')
        </main>
        @include('components.footer')
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </body>
    </html>
</html>

