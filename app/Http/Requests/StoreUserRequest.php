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
            'first_name' => ['required', 'string', 'min:5', 'max:20'],
            'last_name' => ['required', 'string', 'min:5', 'max:20'],
            'email' => ['required', 'email'],
            'gender' => ['required'],
            'phone' => 'rules5',
            'address' => ['nullable'],
            'role' => 'rules7',
        ];
    }
}
