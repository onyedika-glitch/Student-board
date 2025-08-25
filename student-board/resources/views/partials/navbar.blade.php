<nav class="bg-blue-700 text-white shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center font-bold text-xl">
                🎓 Student Board
            </a>

            <!-- Links -->
            <div class="hidden md:flex space-x-6">
                <a href="{{ route('home') }}" class="hover:text-gray-200">Home</a>
                <a href="{{ route('announcements.index') }}" class="hover:text-gray-200">Announcements</a>
                <a href="{{ route('events.index') }}" class="hover:text-gray-200">Events</a>
                <a href="{{ route('timetables.index') }}" class="hover:text-gray-200">Timetable</a>
                <a href="{{ route('results.index') }}" class="hover:text-gray-200">Results</a>
                <a href="{{ route('profile.show') }}" class="hover:text-gray-200">Profile</a>
            </div>

            <!-- Auth -->
            <div class="flex items-center space-x-4">
                @auth
                    <span>{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-red-500 px-3 py-1 rounded">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="bg-white text-blue-700 px-3 py-1 rounded">Login</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
