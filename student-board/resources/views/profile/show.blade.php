@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-10 px-4">
    <!-- Profile Header Card -->
    <div class="bg-white rounded-xl shadow-md p-6 flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <!-- Profile Picture -->
            @if($user->profile_picture)
                <img src="{{ asset('storage/' . $user->profile_picture) }}"
                     alt="Profile Picture"
                     class="w-20 h-20 rounded-full object-cover border shadow">
            @else
                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=0D8ABC&color=fff&size=128"
                     alt="Default Avatar"
                     class="w-20 h-20 rounded-full object-cover border shadow">
            @endif

            <!-- Name + Basic Info -->
            <div>
                <h1 class="text-xl font-bold text-gray-800">{{ $user->name ?? 'Student' }}</h1>
                <p class="text-gray-500">
                    <i class="fas fa-graduation-cap"></i> Year: {{ $user->year ?? '-' }}
                </p>
                <p class="text-gray-500">
                    <i class="fas fa-envelope"></i> {{ $user->email }}
                </p>
                <p class="text-gray-500">
                    <i class="fas fa-check-circle text-green-500"></i> Enrolled
                </p>
            </div>
        </div>

        <!-- Edit Button -->
        <a href="{{ route('profile.edit') }}"
           class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
           Edit Profile
        </a>
    </div>

    <!-- Info Cards Grid -->
    <div class="grid md:grid-cols-2 gap-6 mt-8">
        <!-- Personal Info -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <h2 class="text-lg font-semibold mb-4 flex items-center">
                <i class="fas fa-user mr-2 text-blue-600"></i> Personal Information
            </h2>
            <ul class="space-y-2 text-sm text-gray-700">
                <li><strong>Full Name:</strong> {{ $user->name }}</li>
                <li><strong>Student ID:</strong> {{ $user->student_id ?? 'N/A' }}</li>
                <li><strong>Date of Birth:</strong> {{ $user->dob ?? 'N/A' }}</li>
                <li><strong>Contact Number:</strong> {{ $user->contact ?? 'N/A' }}</li>
                <li><strong>Address:</strong> {{ $user->address ?? 'N/A' }}</li>
            </ul>
        </div>

        <!-- Academic Info -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <h2 class="text-lg font-semibold mb-4 flex items-center">
                <i class="fas fa-book mr-2 text-blue-600"></i> Academic Information
            </h2>
            <ul class="space-y-2 text-sm text-gray-700">
                <li><strong>Department:</strong> {{ $user->department ?? 'N/A' }}</li>
                <li><strong>Year:</strong> {{ $user->year ?? 'N/A' }}</li>
                <li><strong>Enrollment Date:</strong> {{ $user->created_at->format('F j, Y') }}</li>
            </ul>
        </div>
    </div>
</div>
@endsection
