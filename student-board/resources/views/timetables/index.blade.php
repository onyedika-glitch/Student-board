@extends('layouts.app')
@section('title', 'Results')
@section('content')
<h1>Timetable</h1>
<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>Days</th>
            <th>8:30-9:30</th>
            <th>9:30-10:30</th>
            <th>10:30-11:30</th>
            <th>11:30-12:30</th>
            <th>12:30-1:30</th>
            <th>1:30-2:30</th>
            <th>2:30-3:30</th>
        </tr>
    </thead>
    <tbody>
        @foreach(['Monday','Tuesday','Wednesday','Thursday','Friday'] as $day)
            <tr>
                <td><b>{{ $day }}</b></td>
                @foreach(['8:30-9:30','9:30-10:30','10:30-11:30','11:30-12:30','12:30-1:30','1:30-2:30','2:30-3:30'] as $slot)
                    <td>
                        @php
                            $course = $courses->where('day',$day)->where('time_slot',$slot)->first();
                        @endphp
                        @if($course)
                            {{ $course->code }} ({{ $course->venue }})
                        @endif
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
@endsection