<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    public function run()
    {
        DB::table('courses')->insert([

            // ================= MONDAY =================
            [
                'code' => 'SOE 302',
                'title' => 'Software Design',
                'venue' => 'IMT',
                'day' => 'Monday',
                'time_slot' => '10:30-11:30',
            ],
            [
                'code' => 'SOE 302',
                'title' => 'Software Design',
                'venue' => 'IMT',
                'day' => 'Monday',
                'time_slot' => '11:30-12:30',
            ],
            [
                'code' => 'CIT 302',
                'title' => 'Computer Networks',
                'venue' => 'IMT-LH',
                'day' => 'Monday',
                'time_slot' => '12:30-1:30',
            ],
            [
                'code' => 'CIT 302',
                'title' => 'Computer Networks',
                'venue' => 'IMT-LH',
                'day' => 'Monday',
                'time_slot' => '1:30-2:30',
            ],

            // ================= TUESDAY =================
            [
                'code' => 'CIT 304',
                'title' => 'Operating Systems',
                'venue' => 'SOHT',
                'day' => 'Tuesday',
                'time_slot' => '8:30-9:30',
            ],
            [
                'code' => 'CIT 304',
                'title' => 'Operating Systems',
                'venue' => 'SOHT',
                'day' => 'Tuesday',
                'time_slot' => '9:30-10:30',
            ],
            [
                'code' => 'SOE 304',
                'title' => 'Formal Methods',
                'venue' => 'SOHT',
                'day' => 'Tuesday',
                'time_slot' => '12:30-1:30',
            ],
            [
                'code' => 'SOE 304',
                'title' => 'Formal Methods',
                'venue' => 'SOHT',
                'day' => 'Tuesday',
                'time_slot' => '1:30-2:30',
            ],

            // ================= WEDNESDAY =================
            [
                'code' => 'SOE 306',
                'title' => 'Software Engineering',
                'venue' => 'IMT',
                'day' => 'Wednesday',
                'time_slot' => '10:30-11:30',
            ],
            [
                'code' => 'SOE 306',
                'title' => 'Software Engineering',
                'venue' => 'IMT',
                'day' => 'Wednesday',
                'time_slot' => '11:30-12:30',
            ],
            [
                'code' => 'SOE 322',
                'title' => 'Software Testing',
                'venue' => 'IMT',
                'day' => 'Wednesday',
                'time_slot' => '12:30-1:30',
            ],
            [
                'code' => 'SOE 322',
                'title' => 'Software Testing',
                'venue' => 'IMT',
                'day' => 'Wednesday',
                'time_slot' => '1:30-2:30',
            ],

            // ================= THURSDAY =================
            [
                'code' => 'GST 302',
                'title' => 'Entrepreneurship',
                'venue' => 'SMAT AUD',
                'day' => 'Thursday',
                'time_slot' => '8:30-9:30',
            ],
            [
                'code' => 'GST 302',
                'title' => 'Entrepreneurship',
                'venue' => 'SMAT AUD',
                'day' => 'Thursday',
                'time_slot' => '9:30-10:30',
            ],
            [
                'code' => 'CIT 306',
                'title' => 'Database Systems',
                'venue' => 'IMT',
                'day' => 'Thursday',
                'time_slot' => '10:30-11:30',
            ],
            [
                'code' => 'CIT 306',
                'title' => 'Database Systems',
                'venue' => 'IMT',
                'day' => 'Thursday',
                'time_slot' => '11:30-12:30',
            ],

            // ================= FRIDAY =================
            [
                'code' => 'SOE 324',
                'title' => 'Human Computer Interaction',
                'venue' => 'SOHT',
                'day' => 'Friday',
                'time_slot' => '8:30-9:30',
            ],
            [
                'code' => 'SOE 324',
                'title' => 'Human Computer Interaction',
                'venue' => 'SOHT',
                'day' => 'Friday',
                'time_slot' => '9:30-10:30',
            ],
            [
                'code' => 'SOE 326',
                'title' => 'Real Time Systems',
                'venue' => 'IMT',
                'day' => 'Friday',
                'time_slot' => '12:30-1:30',
            ],
            [
                'code' => 'SOE 326',
                'title' => 'Real Time Systems',
                'venue' => 'IMT',
                'day' => 'Friday',
                'time_slot' => '1:30-2:30',
            ],

        ]);
    }
}
