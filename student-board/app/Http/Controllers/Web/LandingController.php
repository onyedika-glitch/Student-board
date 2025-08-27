<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing'); // resources/views/landing.blade.php
    }
}
