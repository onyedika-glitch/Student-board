<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Result, User, Course};

class ResultSeeder extends Seeder
{
    public function run(): void
    {
        // ✅ Just pick/create a student (remove "type")
        $student = User::first() ?? User::factory()->create([
            'name' => 'John Doe',
            'email' => 'student@example.com',
            'password' => bcrypt('password'),
        ]);

        // ✅ Pick an uploader (fallback to first user)
        $uploader = User::skip(1)->first() ?? $student;

        // ✅ If no courses exist, create some
        if (Course::count() === 0) {
            Course::insert([
                ['code' => 'CSC101', 'title' => 'Introduction to Computer Science', 'unit' => 3,'venue' => 'Hall A', 'day'       => 'Monday',
                    'time_slot' => '08:30-10:30', ],
                ['code' => 'MTH102', 'title' => 'Calculus I', 'unit' => 3, 'venue' => 'Hall B', 'day'       => 'Tuesday',
                    'time_slot' => '10:30-12:30', ],
                ['code' => 'PHY103', 'title' => 'General Physics', 'unit' => 2, 'venue' => 'Lab C', 'day'       => 'Wednesday',
                    'time_slot' => '13:00-15:00',],
            ]);
        }

        $courses = Course::all();

        // ✅ Seed results for sessions & semesters
        foreach (['2023/2024', '2024/2025'] as $session) {
            foreach (['First', 'Second'] as $semester) {
                foreach ($courses as $course) {
                    Result::create([
                        'student_id'  => $student->id,
                        'course_id'   => $course->id,
                        'session'     => $session,
                        'semester'    => $semester,
                        'score'       => rand(40, 95),
                        'grade'       => ['A','B','C','D','F'][rand(0,4)],
                        'uploaded_by' => $uploader->id,
                    ]);
                }
            }
        }
    }
}
