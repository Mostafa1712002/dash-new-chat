<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'name' => 'required|string|max:255|regex:/^[a-zA-Z0-9_]+$/|unique:roles,name,' . $this->role?->id,
            'display_name' => 'required|string|max:255',
            'description' => 'nullable|string|min:10|max:1000',
            'permissions' => 'required',
            'permissions.*' => 'exists:permissions,id',
        ];
    }
}
