<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Result extends Model {
  use HasFactory;
  protected $fillable=['student_id','course_code','grade','semester','uploaded_by'];
  public function student(){ return $this->belongsTo(User::class,'student_id'); }
  public function uploader(){ return $this->belongsTo(User::class,'uploaded_by'); }
}
