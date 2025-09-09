<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('notifications', function (Blueprint $table) {
        $table->id(); // Notification ID
        $table->foreignId('recipient_id')->constrained('users')->cascadeOnDelete();
        $table->string('message');
        $table->enum('status', ['read', 'unread'])->default('unread');
        $table->enum('type', ['announcement', 'event'])->nullable();
        $table->timestamps(); // timestamp = created_at
    });
}

public function down(): void
{
    Schema::dropIfExists('notifications');
}


   
};
