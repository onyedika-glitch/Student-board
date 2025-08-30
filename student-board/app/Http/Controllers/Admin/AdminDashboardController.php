<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Announcement;
use App\Models\Event;
use App\Models\Timetable;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'studentCount'      => User::where('role', 'student')->count(),
            'announcementCount' => Announcement::count(),
            'eventCount'        => Event::count(),
            'timetableCount'    => Timetable::count(),
        ]);
    }
}
