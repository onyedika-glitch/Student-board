<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notification;
use App\Models\User;

class NotificationSeeder extends Seeder
{
    public function run(): void
    {
        $notifications = [
            [
                'message' => 'New announcement: Library Renovation starts next week.',
                'status'  => 'unread',
                'type'    => 'announcement',
            ],
            [
                'message' => 'Event Reminder: Freshers Orientation tomorrow at 10 AM.',
                'status'  => 'unread',
                'type'    => 'event',
            ],
            [
                'message' => 'Exam Timetable has been updated.',
                'status'  => 'read',
                'type'    => 'announcement',
            ],
            [
                'message' => 'Don’t miss the Career Fair next Monday.',
                'status'  => 'unread',
                'type'    => 'event',
            ],
            [
                'message' => 'Semester results have been released.',
                'status'  => 'read',
                'type'    => 'announcement',
            ],
        ];

        // Loop through all users and assign notifications
        $users = User::all();

        foreach ($users as $user) {
            foreach ($notifications as $note) {
                Notification::create([
                    'recipient_id' => $user->id,
                    'message'      => $note['message'],
                    'status'       => $note['status'],
                    'type'         => $note['type'],
                ]);
            }
        }

        $this->command->info("✅ Notifications seeded for all users (". $users->count() ." users).");
    }
}
