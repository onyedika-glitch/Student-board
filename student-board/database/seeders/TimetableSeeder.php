<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Timetable;
use App\Models\Course;
use App\Models\User;

class TimetableSeeder extends Seeder
{
    public function run(): void
    {
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];

        $courses = Course::all();

        foreach ($days as $day) {
            foreach ($courses as $course) {
                Timetable::create([
                    'course_id'   => $course->id,
                    'lecturer'    => $course->lecturer ?? 'Unknown Lecturer',
                    'day'         => $day,
                    'time'        => rand(8, 16) . ':00',
                    'venue'       => 'Hall ' . rand(1, 5),
                ]);
            }
        }
    }
}
