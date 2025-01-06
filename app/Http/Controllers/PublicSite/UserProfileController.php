<?php

namespace App\Http\Controllers\PublicSite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function show()
{
    $user = auth()->user(); // Get authenticated user
    $orders = $user->orders()->with('items')->get(); // Fetch user orders with items
    return view('PublicSite.userProfile.userProfile', compact('user', 'orders'));
}

public function updateProfile(Request $request)
{
    $request->validate([
        'city' => 'nullable|string|max:255',
        'street' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:255',
    ]);

    $user = auth()->user();
    $user->update([
        'city' => $request->city,
        'street' => $request->street,
        'address' => $request->address,
    ]);

    return back()->with('success', 'Profile updated successfully!');
}

public function changePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:8|confirmed',
    ]);

    $user = auth()->user();

    if (!\Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'The current password is incorrect.']);
    }

    $user->update(['password' => \Hash::make($request->new_password)]);

    return back()->with('success', 'Password changed successfully!');
}


}
