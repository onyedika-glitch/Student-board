<?php
namespace App\Policies; use App\Models\{Result,User};
class ResultPolicy{ public function create(User $u):bool{return $u->isAdmin();} public function delete(User $u,Result $r):bool{return $u->isAdmin();} public function view(User $u,Result $r):bool{return $u->isAdmin()||$r->student_id===$u->id;}}