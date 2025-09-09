<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('courses', function (Blueprint $table) {
        $table->integer('unit')->default(3); // credit units
    });
}

public function down()
{
    Schema::table('courses', function (Blueprint $table) {
        $table->dropColumn('unit');
    });
}

};
