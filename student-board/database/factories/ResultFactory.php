<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;
use App\Models\Student;

class ResultFactory extends Factory
{
    protected $model = \App\Models\Result::class;

    public function definition()
    {
        $course = Course::where('department', 'Software Engineering')
                        ->inRandomOrder()
                        ->first();

        $student = Student::inRandomOrder()->first(); // assuming you have a Student model

        return [
            'student_id' => $student->id,
            'course_code' => $course->code,
            'course_title' => $course->title,
            'score' => $this->faker->numberBetween(40, 100),
            'grade' => $this->faker->randomElement(['A', 'B', 'C', 'D', 'F']),
            'level' => $student->level, // or assign manually
        ];
    }
}
