<footer class="bg-neutral text-secondary mt-10">
    <div class="max-w-7xl mx-auto px-6 py-10 grid gap-8 md:grid-cols-3">
        <!-- Brand / About -->
        <div>
            <h2 class="text-xl font-bold flex items-center gap-2 text-primary">
                <svg class="w-6 h-6 text-primary" fill="currentColor" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" />
                    <text x="12" y="16" text-anchor="middle" font-size="10" fill="#FFD600">SB</text>
                </svg>
                Student Board
            </h2>
            <p class="mt-3 text-sm leading-relaxed text-yellow-200">
                Your central hub for announcements, events, timetables, and results. Stay connected and informed!
            </p>
        </div>

        <!-- Quick Links -->
        <div>
            <h3 class="text-lg font-semibold text-orange-400">Quick Links</h3>
            <ul class="mt-3 space-y-2 text-sm">
                <li><a href="{{ route('home') }}" class="hover:text-primary">Dashboard</a></li>
                <li><a href="{{ route('announcements.index') }}" class="hover:text-primary">Announcements</a></li>
                <li><a href="{{ route('timetables.index') }}" class="hover:text-primary">Timetables</a></li>
                <li><a href="{{ route('events.index') }}" class="hover:text-primary">Events</a></li>
                @auth
                    <li><a href="{{ route('results.index') }}" class="hover:text-primary">Results</a></li>
                    <li><a href="{{ route('profile.show') }}" class="hover:text-primary">Profile</a></li>
                @endauth
            </ul>
        </div>

        <!-- Contact & Social -->
        <div>
            <h3 class="text-lg font-semibold text-orange-400">Contact & Social</h3>
            <ul class="mt-3 space-y-2 text-sm">
                <li>📧 <a href="mailto:support@studentboard.edu" class="hover:text-primary">support@studentboard.edu</a></li>
                <li>📞 (+234) 9132175272</li>
                <li>📍 Dept. of Software Engineering, University Campus</li>
            </ul>
            <div class="flex gap-4 mt-4">
                <a href="#" class="hover:text-orange-400" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="hover:text-orange-400" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" class="hover:text-orange-400" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" class="hover:text-orange-400" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="border-t border-orange-500">
        <div class="max-w-7xl mx-auto px-6 py-4 flex flex-col sm:flex-row justify-between items-center text-sm text-yellow-200">
            <p>© {{ date('Y') }} Student Board. All rights reserved.</p>
            <span>Powered by Software Engineering Dept.</span>
        </div>
    </div>
</footer>
