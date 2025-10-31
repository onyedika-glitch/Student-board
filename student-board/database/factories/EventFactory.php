<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class EventFactory extends Factory
{
    public function definition(): array
    {
        $titles = [
            'Freshers Orientation',
            'Faculty Sports Competition',
            'General Staff/Student Meeting',
            'Departmental Seminar',
            'Engineering Week',
            'Matriculation Ceremony',
            'Convocation Ceremony',
            'FUTO Cultural Day',
        ];

        $descriptions = [
            'An orientation program for all newly admitted students to introduce them to FUTO culture and academics.',
            'Inter-faculty sports competitions to promote fitness and unity.',
            'A general assembly for staff and students to discuss academic and welfare matters.',
            'A departmental seminar where students present projects and research.',
            'Week-long celebration of engineering innovations and exhibitions.',
            'Matriculation ceremony for fresh students at the University Auditorium.',
            'Convocation ceremony for graduating students, parents, and guests.',
            'Cultural day showcasing traditional heritage and talents from different states.',
        ];

        $start = $this->faker->dateTimeBetween('+1 week', '+2 months');
        $end   = (clone $start)->modify('+3 hours');

        return [
            'title'       => $this->faker->randomElement($titles),
            'description' => $this->faker->randomElement($descriptions),
            'start_date'  => $start,
            'end_date'    => $end,
        ];
    }
}
