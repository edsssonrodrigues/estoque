<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
            'nome' => 'required|min:2',
            'valor' =>  'required|numeric',
            'descricao' =>  'required',
            'quantidade' => 'required|numeric|min:1'
        ];
    }

    /**
     * Custom message for validation.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório!',
            'numeric' => 'O campo :attribute deve ter um valor numérico',
            'quantidade.min' => 'O campo :attribute deve receber pelo menos :min!'
        ];
    }
}
