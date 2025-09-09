@extends('layouts.app')

@section('title', 'Results')

@section('content')
<div class="max-w-6xl mx-auto py-10 space-y-10">

    <!-- Intro Section -->
    <div class="bg-gradient-to-r from-orange-500 to-yellow-500 text-white p-8 rounded-xl shadow-lg">
        <h1 class="text-3xl font-bold">🎓 Academic Results</h1>
        <p class="mt-2 text-lg">Select session & semester below to view results.</p>
        <p class="mt-1 text-sm opacity-80">Default: latest session results are shown.</p>
    </div>

    <!-- Filters -->
    <div class="bg-white shadow-md rounded-lg p-6 flex flex-wrap gap-6 items-end">
        <div>
            <label class="block text-sm font-semibold mb-1">Academic Session</label>
            <select id="session" class="border px-4 py-2 rounded-lg">
                <option value="2024/2025">2024/2025</option>
                <option value="2023/2024">2023/2024</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-1">Semester</label>
            <select id="semester" class="border px-4 py-2 rounded-lg">
                <option value="First">First Semester</option>
                <option value="Second">Second Semester</option>
            </select>
        </div>
    </div>

    <!-- Results Table -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="px-6 py-4 bg-gray-100 border-b">
            <h2 id="results-title" class="text-lg font-bold text-orange-700">
                Results - 2024/2025 (First Semester)
            </h2>
        </div>

        <table class="w-full border-collapse" id="results-table">
            <thead class="bg-orange-50">
                <tr>
                    <th class="px-4 py-2 text-left">Course Code</th>
                    <th class="px-4 py-2 text-left">Course Title</th>
                    <th class="px-4 py-2 text-center">Unit</th>
                    <th class="px-4 py-2 text-center">Score</th>
                    <th class="px-4 py-2 text-center">Grade</th>
                </tr>
            </thead>
            <tbody id="results-body">
                <!-- Dynamic rows injected here -->
            </tbody>
        </table>

        <!-- Summary -->
        <div class="p-6 grid grid-cols-1 sm:grid-cols-2 gap-6 bg-gray-50">
            <div class="p-4 bg-white shadow rounded-lg text-center">
                <p class="text-sm text-gray-600">Total Units</p>
                <p id="total-units" class="text-2xl font-bold text-orange-600">0</p>
            </div>
            <div class="p-4 bg-white shadow rounded-lg text-center">
                <p class="text-sm text-gray-600">GPA</p>
                <p id="gpa" class="text-2xl font-bold text-orange-600">0.00</p>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Hardcoded results dataset
    const resultsData = {
        "2024/2025": {
            "First": [
                { code: "CSC301", title: "Algorithms", unit: 3, score: 85, grade: "A" },
                { code: "MTH302", title: "Linear Algebra", unit: 3, score: 76, grade: "B" },
                 { code: "ECO312", title: "Macroeconomics", unit: 2, score: 75, grade: "B" },
                { code: "PSY313", title: "Cognitive Psychology", unit: 2, score: 88, grade: "A" },
                { code: "SOC314", title: "Social Research Methods", unit: 2, score: 82, grade: "A" },
                { code: "GEO315", title: "Human Geography", unit: 2, score: 77, grade: "B" },
                { code: "HIS316", title: "Ancient Civilizations", unit: 2, score: 80, grade: "A" },
                { code: "ART317", title: "Modern Art", unit: 2, score: 86, grade: "A" },
                { code: "MUS318", title: "Music Theory", unit: 2, score: 90, grade: "A" }
            ],
            "Second": [
                { code: "CSC303", title: "Operating Systems", unit: 3, score: 66, grade: "C" },
                { code: "PHY304", title: "Physics III", unit: 2, score: 72, grade: "B" },
                { code: "ENG305", title: "Advanced English", unit: 2, score: 89, grade: "A" },
                { code: "HIS306", title: "Modern History", unit: 2, score: 81, grade: "A" },
                { code: "STA307", title: "Probability and Statistics", unit: 2, score: 84, grade: "A" },
                { code: "ELE308", title: "Digital Logic Design", unit: 3, score: 79, grade: "B" },
                { code: "CIV309", title: "Structural Analysis", unit: 2, score: 73, grade: "B" },
                { code: "CHE310", title: "Physical Chemistry", unit: 2, score: 68, grade: "C" },
                { code: "BIO311", title: "Molecular Biology", unit: 2, score: 91, grade: "A" },

            ]
        },
        "2023/2024": {
            "First": [
                { code: "CSC201", title: "Data Structures", unit: 3, score: 90, grade: "A" },
                { code: "MTH202", title: "Calculus II", unit: 3, score: 68, grade: "C" },
                { code: "PHY203", title: "General Physics I", unit: 2, score: 80, grade: "A" },
                { code: "ENG204", title: "Technical Writing", unit: 2, score: 88, grade: "A" },
                { code: "STA205", title: "Statistics for Engineers", unit: 2, score: 70, grade: "B" },
                { code: "HUM206", title: "Ethics in Technology", unit: 2, score: 95, grade: "A" },
                { code: "ELE207", title: "Basic Electronics", unit: 3, score: 78, grade: "B" },
                { code: "CIV208", title: "Introduction to Civil Engineering", unit: 2, score: 82, grade: "A" },
                { code: "CHE209", title: "Chemistry for Engineers", unit: 2, score: 74, grade: "B" },
            ],
            "Second": [
                { code: "CSC203", title: "Database Systems", unit: 3, score: 75, grade: "B" },
                { code: "PHY204", title: "General Physics II", unit: 2, score: 82, grade: "A" },
                 { code: "BIO210", title: "Biology Basics", unit: 2, score: 69, grade: "C" },
                { code: "ECO211", title: "Microeconomics", unit: 2, score: 77, grade: "B" },
                { code: "PSY212", title: "Introduction to Psychology", unit: 2, score: 85, grade: "A" },
                { code: "SOC213", title: "Sociology Fundamentals", unit: 2, score: 73, grade: "B"   },
                { code: "GEO214", title: "Physical Geography", unit: 2, score: 80, grade: "A" },
                { code: "HIS215", title: "World History", unit: 2, score: 91, grade: "A" },
                { code: "ART216", title: "Art Appreciation", unit: 2, score: 88, grade: "A" }
            ]
        }
    };

    const sessionSelect = document.getElementById("session");
    const semesterSelect = document.getElementById("semester");
    const resultsBody = document.getElementById("results-body");
    const resultsTitle = document.getElementById("results-title");
    const totalUnitsEl = document.getElementById("total-units");
    const gpaEl = document.getElementById("gpa");

    function renderResults() {
        const session = sessionSelect.value;
        const semester = semesterSelect.value;
        const results = resultsData[session][semester] || [];

        // Update title
        resultsTitle.textContent = `Results - ${session} (${semester} Semester)`;

        // Clear old results
        resultsBody.innerHTML = "";

        // Insert new rows
        let totalUnits = 0;
        let totalScore = 0;
        results.forEach(r => {
            resultsBody.innerHTML += `
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-2">${r.code}</td>
                    <td class="px-4 py-2">${r.title}</td>
                    <td class="px-4 py-2 text-center">${r.unit}</td>
                    <td class="px-4 py-2 text-center">${r.score}</td>
                    <td class="px-4 py-2 text-center font-bold">${r.grade}</td>
                </tr>`;
            totalUnits += r.unit;
            totalScore += r.score;
        });

        // Update summary
        totalUnitsEl.textContent = totalUnits;
        gpaEl.textContent = results.length ? (totalScore / results.length / 20).toFixed(2) : "0.00";
    }

    // Initial render
    renderResults();

    // Update on change
    sessionSelect.addEventListener("change", renderResults);
    semesterSelect.addEventListener("change", renderResults);
});
</script>
@endsection
