<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Student Board') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black font-sans antialiased">

    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-red border-r hidden md:block">
            <div class="p-6 font-bold text-lg text-blue-700">📘 Student Board</div>
            <nav class="space-y-2 px-4">
                <a href="{{ route('home') }}" class="block py-2 px-3 rounded hover:bg-blue-100 {{ request()->routeIs('home') ? 'bg-blue-50 font-semibold' : '' }}">🏠 Home</a>
                <a href="{{ route('announcements.index') }}" class="block py-2 px-3 rounded hover:bg-blue-100 {{ request()->routeIs('announcements.*') ? 'bg-blue-50 font-semibold' : '' }}">📢 Announcements</a>
                <a href="{{ route('events.index') }}" class="block py-2 px-3 rounded hover:bg-blue-100 {{ request()->routeIs('events.*') ? 'bg-blue-50 font-semibold' : '' }}">📅 Events</a>
                <a href="{{ route('timetables.index') }}" class="block py-2 px-3 rounded hover:bg-blue-100 {{ request()->routeIs('timetables.*') ? 'bg-blue-50 font-semibold' : '' }}">📊 Timetables</a>
                @auth
                    <a href="{{ route('results.index') }}" class="block py-2 px-3 rounded hover:bg-blue-100 {{ request()->routeIs('results.*') ? 'bg-blue-50 font-semibold' : '' }}">📝 Results</a>
                @endauth
            </nav>
        </aside>

        <!-- Main content -->
        <div class="flex-1 flex flex-col">
            <!-- Topbar -->
            <header class="bg-green shadow px-6 py-4 flex justify-between items-center">
                <h1 class="font-semibold text-lg">@yield('title')</h1>
                <div>
                    @auth
                        <span class="mr-4 text-gray-600">👤 {{ Auth::user()->name }}</span>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button class="bg-red-500 text-white px-3 py-1 rounded">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a>
                    @endauth
                </div>
            </header>
 <!-- Navbar -->
    @include('partials.navbar')
            <main class="p-6 flex-1">
    @yield('content')
</main>

@include('partials.footer')

        </div>
    </div>

</body>
</html>
