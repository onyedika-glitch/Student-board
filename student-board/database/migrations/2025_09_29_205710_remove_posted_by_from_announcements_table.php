<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('announcements', function (Blueprint $table) {
            // Drop foreign key first
            $table->dropForeign(['posted_by']);
            // Then drop the column
            $table->dropColumn('posted_by');
        });
    }

    public function down(): void
    {
        Schema::table('announcements', function (Blueprint $table) {
            $table->foreignId('posted_by')
                  ->constrained('users')
                  ->cascadeOnDelete();
        });
    }
};
