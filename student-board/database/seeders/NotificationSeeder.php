<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notification;
use App\Models\User;

class NotificationSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first(); 

        $notifications = [
            [
                'recipient_id' => $user->id,
                'message' => 'New announcement: Library Renovation starts next week.',
                'status' => 'unread',
                'type' => 'announcement',
            ],
            [
                'recipient_id' => $user->id,
                'message' => 'Event Reminder: Freshers Orientation tomorrow at 10 AM.',
                'status' => 'unread',
                'type' => 'event',
            ],
            [
                'recipient_id' => $user->id,
                'message' => 'Exam Timetable has been updated.',
                'status' => 'read',
                'type' => 'announcement',
            ],
            [
                'recipient_id' => $user->id,
                'message' => 'Don’t miss the Career Fair next Monday.',
                'status' => 'unread',
                'type' => 'event',
            ],
            [
                'recipient_id' => $user->id,
                'message' => 'Semester results have been released.',
                'status' => 'read',
                'type' => 'announcement',
            ],
        ];

        foreach ($notifications as $note) {
            Notification::create($note);
        }
    }
}
