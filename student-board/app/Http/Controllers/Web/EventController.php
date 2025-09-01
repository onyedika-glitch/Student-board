<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Event\{StoreEventRequest, UpdateEventRequest};
use App\Models\Event;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class EventController extends Controller {
    use AuthorizesRequests;

    public function index() {
        $events = Event::latest('start_date')->paginate(12);
        return view('events.index', compact('events'));
    }

    public function show(Event $event) {
        return view('events.show', compact('event'));
    }

    public function create() {
        $this->authorize('create', Event::class);
        return view('events.form');
    }

    public function store(StoreEventRequest $r) {
        Event::create($r->validated() + ['posted_by' => auth()->id()]);
        return redirect()->route('events.index')->with('success','Created');
    }

    public function edit(Event $event) {
        $this->authorize('update',$event);
        return view('events.form', compact('event'));
    }

    public function update(UpdateEventRequest $r, Event $event) {
        $this->authorize('update',$event);
        $event->update($r->validated());
        return back()->with('success','Updated');
    }

    public function destroy(Event $event) {
        $this->authorize('delete',$event);
        $event->delete();
        return back()->with('success','Deleted');
    }

    public function feed() {
        $events = Event::all([
            'id',
            'title',
            'start_date as start',
            'end_date as end'
        ]);

        return response()->json($events);
    }

    /**
     * 📜 Show archived (past) events with search filter
     */
  public function archive(Request $request)
{
    $query = Event::query();

    // ✅ Search only by title
    if ($request->filled('search')) {
        $query->where('title', 'like', '%' . $request->search . '%');
    }

    // ✅ Past events only (change start_date if your column is named differently, e.g. date)
    $events = $query->whereDate('start_date', '<', now())
                    ->orderBy('start_date', 'desc')
                    ->paginate(10);

    return view('events.archive', compact('events'));
}
}