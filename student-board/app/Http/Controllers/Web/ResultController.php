<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Result\StoreResultRequest;
use App\Models\{Result, Course};
use Illuminate\Http\Request;

class ResultController extends Controller
{
    // ✅ Show results with filtering
    public function index(Request $request)
{
    $sessions = Result::select('session')->distinct()->orderBy('session', 'desc')->pluck('session');
    $semesters = ['First Semester', 'Second Semester'];

    // Default: latest session + first semester
    $selectedSession = $request->get('session', $sessions->first());
    $selectedSemester = $request->get('semester', $semesters[0]);

    $query = Result::with('course')
        ->where('session', $selectedSession)
        ->where('semester', $selectedSemester);

    if (auth()->check()) {
        $query->where('student_id', auth()->id());
    }

    $results = $query->get();

    // Calculate totals
    $totalUnits = $results->sum(fn($r) => $r->course->unit ?? 0);
    $gpa = $results->count() ? round($results->avg('score') / 20, 2) : null;

    return view('results.index', compact(
        'results', 'sessions', 'semesters',
        'selectedSession', 'selectedSemester',
        'totalUnits', 'gpa'
    ));
}


    // ✅ Create form
    public function create()
    {
        $courses = Course::all();
        return view('results.form', compact('courses'));
    }

    // ✅ Store result
    public function store(StoreResultRequest $r)
    {
        Result::create($r->validated() + [
            'uploaded_by' => auth()->id(),
        ]);

        return back()->with('success','Result Uploaded');
    }

    // ✅ Delete result
    public function destroy(Result $result)
    {
        $this->authorize('delete',$result);
        $result->delete();

        return back()->with('success','Result Deleted');
    }
}
