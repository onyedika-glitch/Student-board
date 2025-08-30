<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
    $table->id();
    $table->string('code');       // e.g. SOE 302
    $table->string('title');      // e.g. Software Design
    $table->string('venue');      // e.g. IMT, SOHT, SMAT AUD
    $table->string('day');        // e.g. Monday, Tuesday...
    $table->string('time_slot');  // e.g. 8:30-9:30
    $table->timestamps();
});

    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
