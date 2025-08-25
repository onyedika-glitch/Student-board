<?php
use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;
return new class extends Migration {
  public function up():void{ Schema::create('announcements',function(Blueprint $t){ $t->id(); $t->string('title'); $t->text('content'); $t->string('category')->nullable(); $t->timestamp('visible_from')->nullable(); $t->timestamp('visible_to')->nullable(); $t->foreignId('posted_by')->constrained('users')->cascadeOnDelete(); $t->timestamps(); }); }
  public function down():void{ Schema::dropIfExists('announcements'); }
};
