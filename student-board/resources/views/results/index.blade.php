@extends('layouts.app')
@section('title', 'Results')

@section('content')
<div class="bg-white rounded shadow p-6">
    <h2 class="text-xl font-semibold mb-4">📝 Exam Results</h2>

    @auth
        @if($results->count())
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 text-left">Course</th>
                            <th class="px-4 py-2 text-left">Grade</th>
                            <th class="px-4 py-2 text-left">Semester</th>
                            <th class="px-4 py-2 text-left">Session</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($results as $result)
                            <tr class="border-t">
                                <td class="px-4 py-2">{{ $result->course_name }}</td>
                                <td class="px-4 py-2 font-semibold">{{ $result->grade }}</td>
                                <td class="px-4 py-2">{{ $result->semester }}</td>
                                <td class="px-4 py-2">{{ $result->session }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-gray-500">No results available yet.</p>
        @endif
    @else
        <p class="text-gray-500">Please <a href="{{ route('login') }}" class="text-blue-600">log in</a> to view your results.</p>
    @endauth
</div>
@endsection
