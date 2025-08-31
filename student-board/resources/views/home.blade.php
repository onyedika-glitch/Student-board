@extends('layouts.app')

@section('content')
@vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-black via-orange-600 to-yellow-500 text-white">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-6 py-20">
            
            <!-- Left: Text -->
            <div class="max-w-xl">
                <h1 class="text-5xl font-bold leading-tight">
                    Welcome to <span class="text-yellow-300">FUTO Student Board</span>
                </h1>
                <p class="mt-6 text-lg text-gray-200">
                    One place for Announcements, Events, Timetables, and Results.  
                    Stay connected with the heartbeat of the university 🚀
                </p>

                <div class="mt-8 flex gap-4">
                    @guest
                        <a href="{{ route('register') }}"
                           class="px-6 py-3 bg-orange-500 hover:bg-yellow-400 text-black font-semibold rounded-lg shadow-lg transition">
                            Get Started
                        </a>
                        <a href="{{ route('login') }}"
                           class="px-6 py-3 bg-black border border-yellow-400 text-yellow-400 hover:bg-yellow-500 hover:text-black font-semibold rounded-lg transition">
                            Login
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}"
                           class="px-6 py-3 bg-yellow-400 hover:bg-orange-500 text-black font-semibold rounded-lg shadow-lg transition">
                            Go to Dashboard
                        </a>
                    @endguest
                </div>
            </div>

            <!-- Right: Hero Image -->
            <div class="mt-10 md:mt-0">
                <img src="{{ asset('images/students-learning.jpg') }}"
                     alt="Students learning"
                     class="rounded-2xl shadow-2xl border-4 border-yellow-300">
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="bg-gray-100 py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-black mb-12">Why Use Student Board?</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Announcements -->
                <div class="bg-white rounded-xl shadow-lg p-8 text-center hover:shadow-2xl transition">
                    <div class="text-orange-500 text-5xl mb-4">📢</div>
                    <h3 class="text-xl font-bold mb-2">Stay Updated</h3>
                    <p class="text-gray-600">Get the latest announcements on academics, hostels, and student life.</p>
                </div>

                <!-- Events -->
                <div class="bg-white rounded-xl shadow-lg p-8 text-center hover:shadow-2xl transition">
                    <div class="text-yellow-500 text-5xl mb-4">📅</div>
                    <h3 class="text-xl font-bold mb-2">Never Miss Events</h3>
                    <p class="text-gray-600">Track freshers’ orientation, seminars, sports, and convocation.</p>
                </div>

                <!-- Results & Timetable -->
                <div class="bg-white rounded-xl shadow-lg p-8 text-center hover:shadow-2xl transition">
                    <div class="text-black text-5xl mb-4">📊</div>
                    <h3 class="text-xl font-bold mb-2">Academics Made Easy</h3>
                    <p class="text-gray-600">View your results and access updated course timetables seamlessly.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="bg-black text-white py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold">Be Part of the FUTO Digital Campus Experience</h2>
            <p class="mt-4 text-gray-400">Join thousands of students already connected to the Student Board.</p>

            @guest
                <a href="{{ route('register') }}"
                   class="mt-8 inline-block px-8 py-4 bg-orange-500 hover:bg-yellow-400 text-black font-bold rounded-xl shadow-lg transition">
                    Register Now
                </a>
            @else
                <a href="{{ route('dashboard') }}"
                   class="mt-8 inline-block px-8 py-4 bg-yellow-400 hover:bg-orange-500 text-black font-bold rounded-xl shadow-lg transition">
                    Go to Dashboard
                </a>
            @endguest
        </div>
    </section>
@endsection
