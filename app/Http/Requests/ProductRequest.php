<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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

        return [
            'user_id' => ['required'],
            'brand_id' => ['required'],
            'category_id' => ['required'],
            'name' => ['required'],
            'short_description' => ['nullable'],
            'description' => ['required'],
            'image' => ['required', 'mimes:jpeg,jpg,png,gif', 'max:10000']
        ];
    }
}
