<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');                 // Full name
            $table->string('email')->unique();      // Email
            $table->string('matric_number')->unique(); // Matriculation number
            $table->integer('level');               // 100, 200, 300, 400, 500
            $table->string('department')->default('Software Engineering'); // Department
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
