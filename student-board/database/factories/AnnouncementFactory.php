<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class AnnouncementFactory extends Factory
{
    public function definition(): array
    {
        $titles = [
            'Registration for New Academic Session',
            'Mid-Semester Break Notice',
            'Hostel Allocation Portal Open',
            'Examination Timetable Released',
            'Convocation Ceremony Update',
            'SIWES Orientation for 300L Students',
            'School Fees Payment Deadline',
            'Senate Meeting Resolution',
        ];

        $contents = [
            'All students are advised to complete registration on the FUTO portal before the deadline.',
            'The mid-semester break has been scheduled; lectures resume immediately after.',
            'Students can now apply for hostel spaces via the student portal.',
            'The examination timetable has been released on the departmental notice board and portal.',
            'Convocation holds at the University Auditorium. Graduating students should be seated early.',
            'All 300 level students must attend the SIWES orientation seminar at the ETF Hall.',
            'Ensure school fees are paid on or before the deadline to avoid penalties.',
            'Important resolutions were made during the senate meeting. Details are available on the portal.',
        ];

        return [
            'title'       => $this->faker->randomElement($titles),
            'content'     => $this->faker->randomElement($contents),
            'category'    => $this->faker->randomElement(['Academic', 'Exams', 'General', 'Hostel']),
            'visible_from'=> $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'visible_to'  => $this->faker->dateTimeBetween('+1 month', '+3 months'),
        ];
    }
}
