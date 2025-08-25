<?php
namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Http\Requests\Result\StoreResultRequest;
use App\Models\{Result};
class ResultController extends Controller {
  public function index(){
    $results = auth()->check() && !auth()->user()->isAdmin() ? Result::where('student_id',auth()->id())->latest()->get() : Result::latest()->paginate(20);
    return view('results.index', compact('results'));
  }
  public function store(StoreResultRequest $r){ Result::create($r->validated()+['uploaded_by'=>auth()->id()]); return back()->with('success','Uploaded'); }
  public function destroy(Result $result){ $this->authorize('delete',$result); $result->delete(); return back()->with('success','Deleted'); }
}
