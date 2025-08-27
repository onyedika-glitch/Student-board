<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\{Announcement, Event, Timetable, Result};

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'announcements' => Announcement::latest()->take(5)->get(),
            'events' => Event::orderBy('start_date')->take(5)->get(),
            'timetables' => Timetable::latest()->take(3)->get(),
            'results' => auth()->check() && !auth()->user()->isAdmin()
                ? Result::where('student_id', auth()->id())->latest()->take(5)->get()
                : [],
        ]);
    }
}
