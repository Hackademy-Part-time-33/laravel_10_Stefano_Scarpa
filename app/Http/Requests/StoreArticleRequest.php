<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
            'title' => 'required',
            'autors' => 'required',
            'categories' => 'required',
            'texts' => 'nullable',
            'image' => 'nullable'
        ];
    }

    public function messages(): array
    {
        return [
            'title.require' => 'Il titolo è obbligatorio',
            'autors.required' => 'Inserisci l autore',
            'categories.required' => 'Inserisci la categoria',

        ];
    }
}
