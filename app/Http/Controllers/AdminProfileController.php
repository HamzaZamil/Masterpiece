<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    function show(){

        $user = auth()->user();
        return view('admin.adminsTable.profile', compact('user'));
    }

    public function edit()
    {
        $user = auth()->user(); // Get the logged-in user's details
        return view('admin.adminsTable.editProfile', compact('user'));
    }
    
    public function update(Request $request)
    {
        $user = auth()->user();
    
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|regex:/^\d{10}$/',
        ]);
    
        // Update the user's information
        $user->update([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
        ]);
    
        // Redirect back with a success message
        return redirect()->route('adminProfile')->with('success', 'Profile updated successfully.');
    }
}
