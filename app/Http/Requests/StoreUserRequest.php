<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
{
    return [
        'name' => ['required', 'string', 'min:3', 'max:20'], 
        'last_name' => ['required', 'string', 'min:3', 'max:20'], 
        'email' => ['required', 'email', 'unique:users,email,' . $this->id], // Allow current email
        'gender' => ['required', 'in:male,female'], 
        'phone_number' => ['required', 'digits_between:10,14'], 
        'address' => ['nullable', 'string'], 
        'role' => ['required', 'in:vet,user'], 
        'password' => ['nullable', 'string', 'min:8'], // Password is optional for updates
    ];
}
}
