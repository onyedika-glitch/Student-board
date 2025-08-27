@extends('layouts.app')
@section('title', 'Results')
@section('content')
<h1>Results</h1>

<table class="table">
    <thead>
        <tr>
            <th>Course</th>
            <th>Score</th>
            <th>Grade</th>
            <th>Uploaded By</th>
        </tr>
    </thead>
    <tbody>
        @foreach($results as $result)
            <tr>
                <td>{{ $result->course->code }} - {{ $result->course->title }}</td>
                <td>{{ $result->score }}</td>
                <td>{{ $result->grade }}</td>
                <td>{{ $result->uploader->name ?? 'N/A' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection