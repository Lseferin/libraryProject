<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' =>'required|min:5',
            'autor' =>'required|min:3',
            'preco' =>'required|numeric|between:0,1000',
        ];

    }

    public function messages()
    {
        return [
            'nome.required' => 'Preenchimento do campo é obrigatório',
            'autor.required' => 'Preenchimento do campo é obrigatório',
            'preco.required' => 'Preenchimento do campo é obrigatório',
            'nome.min' => 'Campo nome deve ter pelo menos 5 caracteres',
            'autor.min' => 'Campo autor deve ter pelo menos 3 caracteres',

        ];
    }
}
