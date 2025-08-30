<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Student Board') }}</title>
   <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">

    <!-- Tailwind (compiled once into public/css/app.css) -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Extra styles -->
    @stack('styles')

    <!-- Inline custom CSS (from DB or config) -->
    @if (function_exists('customCode') && customCode()?->css)
        <style>
            {!! customCode()->css !!}
        </style>
    @endif
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.nav')

        <!-- Page Heading -->
        @hasSection('header')
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    @yield('header')
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
        @include('partials.footer')
    </div>
     <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Extra scripts -->
    @stack('scripts')

    <!-- Inline custom JS -->
    @if (function_exists('customCode') && customCode()?->js)
        <script>
            {!! customCode()->js !!}
        </script>
    @endif
</body>
</html>
