<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Announcement extends Model {
  use HasFactory;
  protected $fillable=['title','content','category','posted_by','visible_from','visible_to'];
  public function author(){ return $this->belongsTo(User::class,'posted_by'); }
  public function getBodyAttribute()
{
    return $this->content;
}

}

