<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    // Show all notifications
    public function index(Request $request)
    {
        $query = Notification::where('recipient_id', auth()->id());

        // Optional filter by type
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        $notifications = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('notifications.index', compact('notifications'));
    }

    // Mark notification as read
    public function markAsRead(Notification $notification)
    {
        if ($notification->recipient_id == auth()->id()) {
            $notification->markAsRead();
        }
        return back();
    }

    // Archive (delete)
    public function archive(Notification $notification)
    {
        if ($notification->recipient_id == auth()->id()) {
            $notification->archive();
        }
        return back();
    }
}
