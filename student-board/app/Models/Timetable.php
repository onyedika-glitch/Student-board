<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Timetable extends Model {
  use HasFactory;
  protected $fillable=['course_code','semester','file_path','uploaded_by'];
  public function uploader(){ return $this->belongsTo(User::class,'uploaded_by'); }
}
