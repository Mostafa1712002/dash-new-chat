<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $userId = $this->route('user') ? $this->route('user'): null;
        return [
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $userId,
            'username' => 'required|string|max:255|alpha_dash|unique:users,username,' . $userId,
            'password' => $this->isMethod('post') ? 'required|min:6|confirmed' : 'nullable|min:6|confirmed',
            'mobile' => 'nullable|string|max:20',
            'phone_number' => 'nullable|string|max:20',
            'bio' => 'nullable|string|max:1000',
            'gender' => 'required|in:male,female',
            'country_id' => 'nullable|exists:countries,id',
            // 'language_id' => 'required|exists:mid_languages,id',
            'birth_date' => 'nullable|date',
            'roles' => 'required|array',    
            'roles.*' => 'exists:roles,id',
        ];
    }
}
