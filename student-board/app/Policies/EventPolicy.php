<?php
namespace App\Policies; use App\Models\{Event,User};
class EventPolicy{ public function create(User $u):bool{return $u->isAdmin();} public function update(User $u,Event $e):bool{return $u->isAdmin()&&$e->posted_by===$u->id;} public function delete(User $u,Event $e):bool{return $u->isAdmin();}}