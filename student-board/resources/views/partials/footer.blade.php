<footer class="bg-gray-900 text-gray-400 text-sm">
    <div class="max-w-7xl mx-auto px-6 py-8 grid gap-6 md:grid-cols-3">

        <!-- Brand / About -->
        <div>
            <h2 class="text-lg font-bold flex items-center gap-2 text-yellow-400">
                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" />
                    <text x="12" y="16" text-anchor="middle" font-size="8" fill="#111827">SB</text>
                </svg>
                Student Board
            </h2>
            <p class="mt-2 leading-relaxed">
                Your central hub for announcements, events, timetables, and results.
            </p>
        </div>

        <!-- Quick Links -->
        <div>
            <h3 class="text-sm font-semibold text-yellow-400">Quick Links</h3>
            <ul class="mt-2 space-y-1">
                <li><a href="{{ route('home') }}" class="hover:text-white">Dashboard</a></li>
                <li><a href="{{ route('announcements.index') }}" class="hover:text-white">Announcements</a></li>
                <li><a href="{{ route('timetables.index') }}" class="hover:text-white">Timetables</a></li>
                <li><a href="{{ route('events.index') }}" class="hover:text-white">Events</a></li>
                @auth
                    <li><a href="{{ route('results.index') }}" class="hover:text-white">Results</a></li>
                @endauth
            </ul>
        </div>

        <!-- Contact & Social -->
        <div>
            <h3 class="text-sm font-semibold text-yellow-400">Contact</h3>
            <ul class="mt-2 space-y-1">
                <li><a href="mailto:support@studentboard.edu" class="hover:text-white">📧 support@studentboard.edu</a></li>
                <li>📞 (+234) 913 217 5272</li>
                <li>📍 University Campus</li>
            </ul>
            <div class="flex gap-3 mt-3 text-base">
                <a href="#" class="hover:text-yellow-400"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="hover:text-yellow-400"><i class="fab fa-twitter"></i></a>
                <a href="#" class="hover:text-yellow-400"><i class="fab fa-instagram"></i></a>
                <a href="#" class="hover:text-yellow-400"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="border-t border-gray-700">
        <div class="max-w-7xl mx-auto px-6 py-3 flex flex-col sm:flex-row justify-between items-center text-xs text-gray-500">
            <p>© {{ date('Y') }} Student Board. All rights reserved.</p>
            <span class="mt-1 sm:mt-0">Powered by Software Engineering Dept.</span>
        </div>
    </div>
</footer>
