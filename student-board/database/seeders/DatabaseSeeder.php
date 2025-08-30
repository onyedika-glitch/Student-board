<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\AnnouncementSeeder;
use Database\Seeders\EventSeeder;
use Database\Seeders\CourseSeeder;
use Database\Seeders\ResultSeeder;
use Database\Seeders\TimetableSeeder;
use Database\Seeders\AdminUserSeeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a default user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Call your other seeders
        $this->call([
            AnnouncementSeeder::class,
            EventSeeder::class,
             CourseSeeder::class,
        TimetableSeeder::class,
        ResultSeeder::class,
        AdminUserSeeder::class,
        
        ]);
    }
}
