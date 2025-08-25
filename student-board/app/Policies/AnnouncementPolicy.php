<?php
namespace App\Policies; use App\Models\{Announcement,User};
class AnnouncementPolicy{ public function create(User $u):bool{return $u->isAdmin();} public function update(User $u,Announcement $a):bool{return $u->isAdmin()&&$a->posted_by===$u->id;} public function delete(User $u,Announcement $a):bool{return $u->isAdmin();}}