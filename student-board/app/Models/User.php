<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class User extends Authenticatable {
  use HasFactory, Notifiable;
  protected $fillable=['name','email','password','role','email_verified_at','matric_number',
    'department',
    'phone','remember_token'];
  protected $hidden=['password','remember_token'];
  protected $casts=['email_verified_at'=>'datetime'];
  public function isAdmin(): bool { return ($this->role ?? null)==='admin'; }
}
