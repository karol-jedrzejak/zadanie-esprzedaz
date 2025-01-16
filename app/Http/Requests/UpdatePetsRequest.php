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
        $rules = [
            'name' => 'required',
            'cat_id' => 'required',
            'cat_name' => 'required',
            'photo_url.*' => 'required',
        ];

        return $rules;
    }

    public function messages(): array
    {
        $messages = [
            'name.required' => 'Wprowadź imię.',
            'cat_id.required' => 'Wprowadź nr id.',
            'cat_name.required' => 'Wprowadź nazwę kategorii.',
            'photo_url.*.required' => 'Wprwadź adres URL.',
        ];


        return $messages;
    }
}
