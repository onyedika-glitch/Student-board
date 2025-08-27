<header class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
        <h1 class="text-lg font-semibold text-gray-800">@yield('title')</h1>
        <div>
            @auth
                <span class="mr-4 text-gray-600">Welcome, {{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button class="text-sm text-gray-600 hover:text-gray-900">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-gray-900">Login</a>
            @endauth
        </div>
    </div>
</header>