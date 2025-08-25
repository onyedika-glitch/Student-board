@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <h2 class="text-2xl font-bold mb-4">Profile</h2>

    <div class="grid md:grid-cols-2 gap-6">
        <!-- Personal Info -->
        <div class="bg-white shadow-md rounded-lg p-4">
            <h3 class="text-lg font-semibold mb-2">Personal Information</h3>
            <p><strong>Full Name:</strong> {{ $user->name }}</p>
            <p><strong>Student ID:</strong> {{ $user->student_id ?? 'N/A' }}</p>
            <p><strong>Date of Birth:</strong> {{ $user->dob ?? 'N/A' }}</p>
            <p><strong>Contact Number:</strong> {{ $user->contact ?? 'N/A' }}</p>
            <p><strong>Address:</strong> {{ $user->address ?? 'N/A' }}</p>
        </div>

        <!-- Academic Info -->
        <div class="bg-white shadow-md rounded-lg p-4">
            <h3 class="text-lg font-semibold mb-2">Academic Information</h3>
            <p><strong>Department:</strong> {{ $user->department ?? 'N/A' }}</p>
            <p><strong>Year:</strong> {{ $user->year ?? 'N/A' }}</p>
            <p><strong>Enrollment Date:</strong> {{ $user->created_at->toDateString() }}</p>
        </div>
    </div>

    <div class="mt-6">
        <a href="{{ route('profile.edit') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Edit Profile</a>
    </div>
</div>
@endsection
