<?php
use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;
return new class extends Migration {
  public function up():void{ Schema::create('results',function(Blueprint $t){ $t->id(); $t->foreignId('student_id')->constrained('users')->cascadeOnDelete(); $t->string('course_code',20); $t->string('grade',5); $t->string('semester',30); $t->foreignId('uploaded_by')->constrained('users')->cascadeOnDelete(); $t->timestamps(); }); }
  public function down():void{ Schema::dropIfExists('results'); }
};
