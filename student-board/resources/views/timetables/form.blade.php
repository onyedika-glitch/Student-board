{{-- resources/views/timetables/form.blade.php --}}
@extends('layouts.app')

@section('title', 'Upload Timetable')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-6">
    <h2 class="text-2xl font-bold mb-6">📊 Upload New Timetable</h2>

    {{-- Show validation errors --}}
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.timetables.store') }}" enctype="multipart/form-data" class="space-y-4">
        @csrf

        {{-- Course --}}
        <div>
            <label for="course_code" class="block font-semibold">Course</label>
            <select name="course_code" id="course_code" class="w-full border rounded px-3 py-2">
                <option value="">-- Select Course --</option>
                @foreach($courses as $course)
                    <option value="{{ $course->code }}">{{ $course->title }} ({{ $course->code }})</option>
                @endforeach
            </select>
        </div>

        {{-- Semester --}}
        <div>
            <label for="semester" class="block font-semibold">Semester</label>
            <select name="semester" id="semester" class="w-full border rounded px-3 py-2">
                <option value="First Semester">First Semester</option>
                <option value="Second Semester">Second Semester</option>
            </select>
        </div>

        {{-- File upload --}}
        <div>
            <label for="file" class="block font-semibold">Timetable File (PDF, DOCX, XLSX)</label>
            <input type="file" name="file" id="file" class="w-full border rounded px-3 py-2">
        </div>

        {{-- Submit --}}
        <div class="flex justify-end">
            <button type="submit" class="px-5 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Upload Timetable
            </button>
        </div>
    </form>
</div>
@endsection
