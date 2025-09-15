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
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
             'matric_number' => 'required|string|max:20',
             'phone' => 'required|string|max:20',
        ]);

        // ✅ Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        $user->update($request->except('profile_picture'));

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }
}
