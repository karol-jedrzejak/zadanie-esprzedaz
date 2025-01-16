<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePetsRequest extends FormRequest
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
            'photo_url.*' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Wprowadź imię.',
            'cat_id.required' => 'Wprowadź nr id.',
            'cat_name.required' => 'Wprowadź nazwę kategorii.',
            'photo_url.*.required' => 'Wprwadź adres URL.',
        ];
    }
}
