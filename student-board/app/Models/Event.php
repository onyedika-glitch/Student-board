<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Event extends Model {
  use HasFactory;
  protected $fillable=['title','description','start_date','end_date','posted_by'];
  protected $casts=['start_date'=>'datetime','end_date'=>'datetime'];
  public function author(){ return $this->belongsTo(User::class,'posted_by'); }
}
