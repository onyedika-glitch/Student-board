<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        // Clear old events
        Event::truncate();

        $now = Carbon::now();

        $events = [
            [
                'title'       => 'Freshers Orientation',
                'description' => 'Orientation program for new students.',
               'start_date'  => Carbon::now()->addDays(3)->setTime(9, 0),
        'end_date'    => Carbon::now()->addDays(3)->setTime(12, 0),
            ],
            [
                'title'       => 'Matriculation Ceremony',
                'description' => 'Official induction of first-year students.',
                'start_date'  => Carbon::now()->addWeeks(1)->setTime(10, 0),
        'end_date'    => Carbon::now()->addWeeks(1)->setTime(13, 0),
            ],
            [
                'title'       => 'Mid-Semester Exams',
                'description' => 'Examinations for all students.',
                  'start_date'  => Carbon::now()->addWeeks(3)->setTime(8, 0),
        'end_date'    => Carbon::now()->addWeeks(3)->addDays(5)->setTime(17, 0),
            ],
            [
                'title'       => 'Convocation',
                'description' => 'Graduation ceremony for final-year students.',
               'start_date'  => Carbon::now()->addMonth()->setTime(9, 0),
        'end_date'    => Carbon::now()->addMonth()->setTime(14, 0),
            ],
            [
                'title'       => 'End of Semester Exams',
                'description' => 'Final examinations for the semester.',
                    'start_date'  => Carbon::now()->addMonths(3)->setTime(9, 0),
                        'end_date'    => Carbon::now()->addMonths(3)->addDays(5)->setTime(16, 0),
            ],
            [
                'title'       => 'Sports Week',
                'description' => 'Inter-departmental sports competitions.',
                 'start_date'  => Carbon::now()->addMonths(2)->setTime(9, 0),
        'end_date'    => Carbon::now()->addMonths(2)->addDays(5)->setTime(18, 0),
            ],
        ];

        foreach ($events as $event) {
            Event::create([
                'title'       => $event['title'],
                'description' => $event['description'],
                'start_date'  => $event['start_date'],
                'end_date'    => $event['end_date'],
                'posted_by'   => 1, // Change if you want dynamic uploader
            ]);
            Event::factory()->count(10)->create();
        }
    }
}
