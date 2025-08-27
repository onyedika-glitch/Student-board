<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Timetable\StoreTimetableRequest;
use App\Models\Timetable;
use App\Models\Course; // <-- make sure Course model exists
use Illuminate\Support\Facades\Storage;

class TimetableController extends Controller {
    public function index()
    {
        if (auth()->check()) {
            $timetables = Timetable::where('type', auth()->user()->type)
                ->latest()
                ->paginate(20);
        } else {
            $timetables = Timetable::latest()->paginate(20);
        }

        // fetch all courses
        $courses = Course::all();

        return view('timetables.index', compact('timetables', 'courses'));
    }

    public function create()
    { 
        $this->authorize('create', Timetable::class);

        // fetch all courses for the form
        $courses = Course::all();

        return view('timetables.form', compact('courses'));
    }

    public function store(StoreTimetableRequest $r)
    {
        $path = $r->file('file')->store('timetables','public');

        Timetable::create([
            'course_code' => $r->course_code,
            'semester'    => $r->semester,
            'file_path'   => $path,
            'uploaded_by' => auth()->id(),
        ]);

        return back()->with('success','Uploaded');
    }

    public function destroy(Timetable $timetable)
    {
        $this->authorize('delete', $timetable);

        Storage::disk('public')->delete($timetable->file_path);

        $timetable->delete();

        return back()->with('success','Deleted');
    }
}
