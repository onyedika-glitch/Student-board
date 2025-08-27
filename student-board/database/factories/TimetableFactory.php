<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;

class TimetableFactory extends Factory
{
    protected $model = \App\Models\Timetable::class;

    public function definition()
    {
        // Pick a random Software Engineering course
        $course = Course::where('department', 'Software Engineering')
                        ->inRandomOrder()
                        ->first();

        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        $times = ['08:00-10:00', '10:00-12:00', '12:00-14:00', '14:00-16:00'];

        return [
            'course_code' => $course->code,
            'course_title' => $course->title,
            'day_of_week' => $this->faker->randomElement($days),
            'start_time' => $this->faker->randomElement($times),
            'venue' => 'Lecture Hall ' . $this->faker->randomElement(['A','B','C']),
        ];
    }
}
