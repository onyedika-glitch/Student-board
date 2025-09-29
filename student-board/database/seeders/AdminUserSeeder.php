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
 ['id' => 1],
            [
                'name' => 'Software Admin',
                'email' => 'admin@futo.edu.ng',
                'password' => Hash::make('God@100'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );
    }
}
