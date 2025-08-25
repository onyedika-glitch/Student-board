<?php
namespace App\Policies; use App\Models\{Timetable,User};
class TimetablePolicy{ public function create(User $u):bool{return $u->isAdmin();} public function delete(User $u,Timetable $t):bool{return $u->isAdmin();}}