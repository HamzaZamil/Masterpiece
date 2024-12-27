<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'phone_number' => 'required|regex:/^[0-9]{10,15}$/', // Ensures only valid phone numbers
            'address' => 'required|string|max:255', // Ensures only valid phone numbers
            'street' => 'required|string|max:255', // Ensures only valid phone numbers
            'city' => 'required|string|max:255', // Ensures only valid phone numbers
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'gender' => $request->gender, // Store the selected gender
            'phone_number' => $request->phone_number, // Storing phone number
            'address' => $request->address, // Storing phone number
            'street' => $request->street, // Storing phone number
            'city' => $request->city, // Storing phone number
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('homeContainer');
    }
}
