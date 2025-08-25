<?php
namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Http\Requests\Event\{StoreEventRequest, UpdateEventRequest};
use App\Models\Event;
class EventController extends Controller {
  public function index(){ $events = Event::latest('start_date')->paginate(12); return view('events.index', compact('events')); }
  public function show(Event $event){ return view('events.show', compact('event')); }
  public function create(){ $this->authorize('create', Event::class); return view('events.form'); }
  public function store(StoreEventRequest $r){ Event::create($r->validated()+['posted_by'=>auth()->id()]); return redirect()->route('events.index')->with('success','Created'); }
  public function edit(Event $event){ $this->authorize('update',$event); return view('events.form', compact('event')); }
  public function update(UpdateEventRequest $r, Event $event){ $this->authorize('update',$event); $event->update($r->validated()); return back()->with('success','Updated'); }
  public function destroy(Event $event){ $this->authorize('delete',$event); $event->delete(); return back()->with('success','Deleted'); }
}
