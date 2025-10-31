<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Announcement;

class OldAnnouncementsSeeder extends Seeder
{
    public function run(): void
    {
        $announcements = [
            [
                'title' => 'Library Renovation',
                'content' => 'The university library will be closed for renovation in March 2021.',
                'created_at' => '2021-03-01 10:00:00',
                'updated_at' => '2021-03-01 10:00:00',
            ],
            [
                'title' => 'COVID-19 Guidelines',
                'content' => 'Students must follow safety protocols on campus.',
                'created_at' => '2021-09-15 09:00:00',
                'updated_at' => '2021-09-15 09:00:00',
            ],
            [
                'title' => 'New Hostel Rules',
                'content' => 'Updated hostel rules effective from January 2022.',
                'created_at' => '2022-01-10 08:30:00',
                'updated_at' => '2022-01-10 08:30:00',
            ],
            [
                'title' => 'Exam Timetable Released',
                'content' => 'The exam timetable for second semester is now available.',
                'created_at' => '2022-06-05 11:00:00',
                'updated_at' => '2022-06-05 11:00:00',
            ],
            [
                'title' => 'Power Outage Notice',
                'content' => 'Scheduled maintenance will cause a power outage on campus.',
                'created_at' => '2023-02-20 14:00:00',
                'updated_at' => '2023-02-20 14:00:00',
            ],
        ];

        foreach ($announcements as $a) {
            Announcement::create($a);
        }
    }
}
