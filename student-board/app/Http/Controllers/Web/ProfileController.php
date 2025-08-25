<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
     public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }
}
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'student_id' => 'nullable|string|max:20',
            'dob' => 'nullable|date',
            'contact' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'year' => 'nullable|string|max:10',
        ]);

        $user->update($request->all());

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }
}
