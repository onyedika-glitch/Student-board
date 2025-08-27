<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();

            // Foreign key to users (students)
            $table->foreignId('student_id')->constrained('users')->onDelete('cascade');

            // Foreign key to courses
            $table->foreignId('course_id')->constrained()->onDelete('cascade');

            $table->integer('score');
            $table->string('grade', 2);

            // Who uploaded (usually an admin/lecturer)
            $table->foreignId('uploaded_by')->constrained('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
