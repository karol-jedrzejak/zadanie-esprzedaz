<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePetsRequest extends FormRequest
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
            'name' => 'required',
            'cat_id' => 'required',
            'cat_name' => 'required',
            'tags_id' => 'required',
            'tags_name' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Wprowadź imię.',
            'cat_id.required' => 'Wprowadź id kategori.',
            'cat_name.required' => 'Wprowadź nazwę kategori.',
            'tags_id.required' => 'Wprowadź id tagu.',
            'tags_name.required' => 'Wprowadź nazwę tagu.',
        ];
    }
}
