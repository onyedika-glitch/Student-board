<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();

            // 🔑 Who the result belongs to
            $table->foreignId('student_id')->constrained('users')->cascadeOnDelete();

            // 🔑 Course reference
            $table->foreignId('course_id')->constrained('courses')->cascadeOnDelete();

            // 📚 Academic info
            $table->string('session');   // e.g. 2023/2024
            $table->string('semester');  // e.g. First / Second

            // 🎯 Performance
            $table->integer('score');
            $table->string('grade');

            // 🔑 Who uploaded it
            $table->foreignId('uploaded_by')->constrained('users')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
