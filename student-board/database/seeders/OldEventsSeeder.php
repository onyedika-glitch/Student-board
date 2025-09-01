<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class OldEventsSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            [
                'title' => 'Freshers Orientation',
                'description' => 'Orientation for new students.',
                'start_date' => '2021-09-10 09:00:00',
                'end_date' => '2021-09-10 12:00:00',
                'posted_by' => 1,
            ],
            [
                'title' => 'Cultural Day',
                'description' => 'Annual celebration of cultural diversity.',
                'start_date' => '2022-03-15 10:00:00',
                'end_date' => '2022-03-15 15:00:00',
                'posted_by' => 1,
            ],
            [
                'title' => 'Sports Festival',
                'description' => 'Inter-departmental sports competition.',
                'start_date' => '2022-11-05 08:00:00',
                'end_date' => '2022-11-05 18:00:00',
                'posted_by' => 1,
            ],
            [
                'title' => 'Hackathon 2023',
                'description' => 'Campus-wide coding competition.',
                'start_date' => '2023-04-20 09:00:00',
                'end_date' => '2023-04-21 17:00:00',
                'posted_by' => 1,
            ],
            [
                'title' => 'Convocation 2023',
                'description' => 'Graduation ceremony for final year students.',
                'start_date' => '2023-07-30 10:00:00',
                'end_date' => '2023-07-30 14:00:00',
                'posted_by' => 1,
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
