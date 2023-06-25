<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|min:4',
            'family' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'role' => 'required|string',

//            'profile.national_code' => 'required|string',
//            'profile.education' => 'required|array',
//            'profile.education.*.name' => 'required|string',
//            'profile.education.*.grade' => 'int',
        ];

        if ($this->method() == self::METHOD_PATCH) {
            $rules['phone_number'] = 'required';
            $rules['email'] = ['required', 'email', 'unique:users,email,' . request()->user->id];
        }

        // str_contains(request()->url(), route('admin.user.store')

        if ($this->method() == self::METHOD_POST) {
            $rules['password'] = 'required';
            $rules['email'] = 'required|email|unique:users,email';
        }

        return $rules;
    }
}
