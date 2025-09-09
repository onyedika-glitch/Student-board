<?php
namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Http\Requests\Announcement\{StoreAnnouncementRequest, UpdateAnnouncementRequest};
use App\Models\Announcement;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class AnnouncementController extends Controller {
  use AuthorizesRequests;
  public function index(){ $announcements = Announcement::latest()->paginate(12); return view('announcements.index', compact('announcements')); }
  public function show(Announcement $announcement){ return view('announcements.show', compact('announcement')); }
  public function create(){ $this->authorize('create', Announcement::class); return view('announcements.form'); }
  public function store(StoreAnnouncementRequest $r){ Announcement::create($r->validated()+['posted_by'=>auth()->id()]); return redirect()->route('announcements.index')->with('success','Created'); }
  public function edit(Announcement $announcement){ $this->authorize('update',$announcement); return view('announcements.form', compact('announcement')); }
  public function update(UpdateAnnouncementRequest $r, Announcement $announcement){ $this->authorize('update',$announcement); $announcement->update($r->validated()); return back()->with('success','Updated'); }
  public function destroy(Announcement $announcement){ $this->authorize('delete',$announcement); $announcement->delete(); return back()->with('success','Deleted'); }

  public function archive(Request $request)
{
    $query = Announcement::query();

    // ✅ Search only by title
    if ($request->filled('search')) {
        $query->where('title', 'like', '%' . $request->search . '%');
    }

    // ✅ Past events only (change created_at if your column is named differently, e.g. date)
    $announcements = $query->whereDate('created_at', '<', now())
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);

    return view('announcements.archive', compact('announcements'));
}

}
