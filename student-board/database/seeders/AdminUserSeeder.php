<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder; use App\Models\User; use Illuminate\Support\Facades\Hash;
class AdminUserSeeder extends Seeder { public function run(): void { User::updateOrCreate(['email'=>'admin@dept.edu'],['name'=>'Department Admin','password'=>Hash::make('ChangeMe123!'),'role'=>'admin','email_verified_at'=>now()]); } }
