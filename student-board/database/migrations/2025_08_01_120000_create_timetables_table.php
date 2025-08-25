<?php
use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;
return new class extends Migration {
  public function up():void{ Schema::create('timetables',function(Blueprint $t){ $t->id(); $t->string('course_code',20)->nullable(); $t->string('semester',30); $t->string('file_path'); $t->foreignId('uploaded_by')->constrained('users')->cascadeOnDelete(); $t->timestamps(); }); }
  public function down():void{ Schema::dropIfExists('timetables'); }
};
