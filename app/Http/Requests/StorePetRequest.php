<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePetRequest extends FormRequest
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
            'user_id' => ['required', 'exists:users,id'], // Must reference an existing user
            'pet_name' => ['required', 'string', 'max:50'], // Pet name must be a string
            'pet_type' => ['required', 'in:cat,dog'], // Only 'cat' or 'dog' are valid
            'pet_breed' => ['nullable', 'string', 'max:50'], // Optional, string with max length
            'pet_age' => ['nullable', 'integer', 'min:0'], // Optional, must be a non-negative integer
            'pet_weight' => ['nullable', 'integer', 'min:0'], // Optional, must be a non-negative integer
            'pet_gender' => ['required', 'in:male,female'], // Only 'male' or 'female' are valid
            'pet_image' => ['nullable', 'string', 'max:255'], // Optional, must be a string (image URL or path)
            'pet_medical_history' => ['nullable', 'string', 'max:1000'], // Optional, freeform text
        ];
    }
}
