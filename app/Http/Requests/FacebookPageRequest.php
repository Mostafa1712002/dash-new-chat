<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FacebookPageRequest extends FormRequest
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
        $userId = $this->route('facebook-page') ? $this->route('facebook-page'): null;
        return [
            'page_id' => 'required|string|max:255',
            'type'  => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'access_token' => 'required|string|min:10',
           
        ];
    }
}
