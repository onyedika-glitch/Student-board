<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Result\StoreResultRequest;
use App\Models\{Result, Course};

class ResultController extends Controller
{
    public function index()
    {
        if (auth()->check() && auth()->user()->type == 'student') {
            $results = Result::with('course')
                        ->where('student_id', auth()->id())
                        ->latest()
                        ->get();
        } else {
            $results = Result::with('course')->latest()->paginate(20);
        }

        return view('results.index', compact('results'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('results.form', compact('courses'));
    }

    public function store(StoreResultRequest $r)
    {
        Result::create($r->validated() + [
            'uploaded_by' => auth()->id(),
        ]);

        return back()->with('success','Result Uploaded');
    }

    public function destroy(Result $result)
    {
        $this->authorize('delete',$result);
        $result->delete();

        return back()->with('success','Result Deleted');
    }
}
