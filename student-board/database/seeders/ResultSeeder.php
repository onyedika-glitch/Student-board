<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Course;
use App\Models\Result;

class ResultSeeder extends Seeder
{
    public function run(): void
    {
        // Fetch all students from users table
        $students = User::where('role', 'student')->get();

        // Fetch all courses
        $courses = Course::all();

        foreach ($students as $student) {
            foreach ($courses as $course) {
                // Create random result for each student in each course
                $score = rand(40, 100);

                Result::create([
                    'student_id'   => $student->id,       // comes from users table
                    'course_id'    => $course->id,
                    'score'        => $score,
                    'grade'        => $this->getGrade($score),
                    'uploaded_by'  => 1, // Admin user ID (you can change this)
                ]);
            }
        }
    }

    private function getGrade($score): string
    {
        return match (true) {
            $score >= 70 => 'A',
            $score >= 60 => 'B',
            $score >= 50 => 'C',
            $score >= 45 => 'D',
            $score >= 40 => 'E',
            default      => 'F',
        };
    }
}
