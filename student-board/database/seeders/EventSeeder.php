<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    public function run(): void
    {
         Event::create([
            'title'       => 'Freshers Orientation',
            'description' => 'Orientation program for new students to familiarize them with the campus and resources.',
            'start_date'  => '2024-09-10 09:00:00',
            'end_date'    => '2024-09-10 12:00:00',
            'posted_by'   => 1,
        ]);

        Event::create([
            'title'       => 'Departmental Seminar',
            'description' => 'A seminar on emerging technologies and research in Computer Science.',
            'start_date'  => '2024-10-05 14:00:00',
            'end_date'    => '2024-10-05 17:00:00',
            'posted_by'   => 1,
        ]);
        Event::factory()->count(10)->create();
    }
}
