<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Announcement;

class AnnouncementSeeder extends Seeder
{
    public function run(): void
    {
       Announcement::create([
    'title'     => 'Registration for the 2025/2026 Academic Session',
    'content'      => 'Registration starts on Sept 1, 2025. Please complete your registration early.',
    'visible_from'      => '2025-09-01',
    'posted_by' => 1, // assuming user with ID=1 is admin
]);

Announcement::create([
    'title'     => 'Mid-semester break',
    'content'      => 'The mid-semester break is scheduled for Oct 15–20, 2025.',
    'visible_from'      => '2025-10-15',
    'posted_by' => 1,
]);

Announcement::create([
    'title'     => 'Hostel Allocation Portal Now Open',
    'content'      => 'Students can now apply for hostel accommodation online.',
    'visible_from'      => now(),
    'posted_by' => 1,
]);
Announcement::factory()->count(20)->create();
    }
}
