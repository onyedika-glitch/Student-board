<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(

            ['email' => 'admin@futo.edu.ng'],
            [
                'name' => 'Software Admin',
                'password' => Hash::make('God@100'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );
    }
}


