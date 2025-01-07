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
        'phone_number' => 'required|regex:/^\d{10}$/',
        'address' => 'required|string|max:255',
        'street' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => [
            'required',
            'string',
            'min:8',
            'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).+$/',
            'confirmed',
        ],
    ], [
        'name.required' => 'The first name is required. Please provide your first name.',
        'name.string' => 'The first name must be a valid string.',
        'name.max' => 'The first name cannot exceed 255 characters.',
        
        'last_name.required' => 'The last name is required. Please provide your last name.',
        'last_name.string' => 'The last name must be a valid string.',
        'last_name.max' => 'The last name cannot exceed 255 characters.',
        
        'gender.required' => 'The gender field is required. Please select a gender.',
        'gender.in' => 'The gender must be either "male" or "female".',
        
        'phone_number.required' => 'The phone number is required.',
        'phone_number.regex' => 'The phone number must be exactly 10 digits.',
        
        'address.required' => 'The address is required. Please provide your address.',
        'address.string' => 'The address must be a valid string.',
        'address.max' => 'The address cannot exceed 255 characters.',
        
        'street.required' => 'The street is required. Please provide your street.',
        'street.string' => 'The street must be a valid string.',
        'street.max' => 'The street cannot exceed 255 characters.',
        
        'city.required' => 'The city is required. Please provide your city.',
        'city.string' => 'The city must be a valid string.',
        'city.max' => 'The city cannot exceed 255 characters.',
        
        'email.required' => 'The email address is required. Please provide your email.',
        'email.email' => 'The email must be a valid email address (e.g., user@example.com).',
        'email.unique' => 'This email is already registered. Please use a different email.',
        
        'password.required' => 'The password is required. Please provide a password.',
        'password.string' => 'The password must be a valid string.',
        'password.min' => 'The password must be at least 8 characters long.',
        'password.regex' => 'The password must contain at least one uppercase letter, one lowercase letter, and one number.',
        'password.confirmed' => 'The password confirmation does not match the password.',
    ]);

    $user = User::create([
        'name' => $request->name,
        'last_name' => $request->last_name,
        'gender' => $request->gender,
        'phone_number' => $request->phone_number,
        'address' => $request->address,
        'street' => $request->street,
        'city' => $request->city,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    event(new Registered($user));

    Auth::login($user);

    return redirect()->route('the_home');
}

}
