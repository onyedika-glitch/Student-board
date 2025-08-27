<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('timetables', function (Blueprint $table) {
            $table->id();

            // Foreign key to courses
            $table->foreignId('course_id')->constrained()->onDelete('cascade');

            $table->string('lecturer')->nullable();
            $table->string('day');
            $table->string('time');
            $table->string('venue');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('timetables');
    }
};
