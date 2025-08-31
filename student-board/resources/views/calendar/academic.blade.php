@extends('layouts.app')

@section('title', 'Academic Calendar')

@section('content')
<div class="max-w-4xl mx-auto py-10">
    <h1 class="text-3xl font-bold text-center mb-6">📚 Academic Calendar</h1>

    <!-- Year Selector -->
    <div class="mb-6 text-center">
        <label for="year" class="mr-2 font-semibold">Select Year:</label>
        <select id="year" class="px-4 py-2 border rounded-lg">
            <option value="">-- Choose Year --</option>
            @for ($y = 2020; $y <= 2025; $y++)
                <option value="{{ $y }}">{{ $y }}</option>
            @endfor
        </select>
    </div>

    <!-- Calendar Display -->
    <div id="calendar-display" class="text-center hidden">
        <h2 id="calendar-title" class="text-xl font-semibold mb-4"></h2>
        <img id="calendar-image" src="" alt="Academic Calendar" class="rounded-lg shadow-lg mx-auto">
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const yearSelect = document.getElementById("year");
        const calendarDisplay = document.getElementById("calendar-display");
        const calendarImage = document.getElementById("calendar-image");
        const calendarTitle = document.getElementById("calendar-title");

        // Predefined academic calendar images per year
        const calendarImages = {
            2020: "{{ asset('images/academic/2020.png') }}",
            2021: "{{ asset('images/academic/2021.png') }}",
            2022: "{{ asset('images/academic/2022.png') }}",
            2023: "{{ asset('images/academic/2023.png') }}",
            2024: "{{ asset('images/academic/2024.png') }}",
            2025: "{{ asset('images/academic/2025.png') }}",
        };

        yearSelect.addEventListener("change", function () {
            const selectedYear = this.value;
            if (calendarImages[selectedYear]) {
                calendarDisplay.classList.remove("hidden");
                calendarImage.src = calendarImages[selectedYear];
                calendarTitle.innerText = `Academic Calendar - ${selectedYear}`;
            } else {
                calendarDisplay.classList.add("hidden");
            }
        });
    });
</script>
@endsection
