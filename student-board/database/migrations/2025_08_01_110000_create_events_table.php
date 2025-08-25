<?php
use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;
return new class extends Migration {
  public function up():void{ Schema::create('events',function(Blueprint $t){ $t->id(); $t->string('title'); $t->text('description')->nullable(); $t->dateTime('start_date'); $t->dateTime('end_date')->nullable(); $t->foreignId('posted_by')->constrained('users')->cascadeOnDelete(); $t->timestamps(); }); }
  public function down():void{ Schema::dropIfExists('events'); }
};
