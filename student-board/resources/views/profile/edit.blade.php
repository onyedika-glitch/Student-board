@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6">My Profile</h1>

    <!-- User Info Card -->
    <div class="bg-white shadow rounded-lg p-6 mb-6">
        <div class="flex items-center space-x-4">
            <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center text-2xl font-bold text-blue-600">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <div>
                <h2 class="text-xl font-semibold">{{ Auth::user()->name }}</h2>
                <p class="text-gray-600">{{ Auth::user()->email }}</p>
            </div>
        </div>
    </div>

    <!-- Update Name/Email -->
    <div class="bg-white shadow rounded-lg p-6 mb-6">
        <h2 class="text-xl font-semibold mb-4">Update Information</h2>
        @include('profile.partials.update-profile-information-form')
    </div>

    <!-- Update Password -->
    <div class="bg-white shadow rounded-lg p-6 mb-6">
        <h2 class="text-xl font-semibold mb-4">Change Password</h2>
        @include('profile.partials.update-password-form')
    </div>

    <!-- Delete Account -->
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4 text-red-600">Delete Account</h2>
        @include('profile.partials.delete-user-form')
    </div>
</div>
<!-- Matric Number -->
<div class="mt-4">
    <x-input-label for="matric_number" :value="__('Matric Number')" />
    <x-text-input id="matric_number" name="matric_number" type="text" class="mt-1 block w-full"
        :value="old('matric_number', $user->matric_number)" required />
    <x-input-error :messages="$errors->get('matric_number')" class="mt-2" />
</div>

<!-- Department -->
<div class="mt-4">
    <x-input-label for="department" :value="__('Department')" />
    <x-text-input id="department" name="department" type="text" class="mt-1 block w-full"
        :value="old('department', $user->department)" required />
    <x-input-error :messages="$errors->get('department')" class="mt-2" />
</div>

<!-- Phone -->
<div class="mt-4">
    <x-input-label for="phone" :value="__('Phone')" />
    <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full"
        :value="old('phone', $user->phone)" required />
    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
</div>

@endsection
