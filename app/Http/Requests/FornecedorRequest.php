<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FornecedorRequest extends FormRequest
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
          'descricao' => 'required|max:30',
          'ddd' => 'required|min:2|max:2',
          'telefone' => 'required|min:8|max:9',
          'endereco' => 'required|min:5|max:40',
          'cidade' => 'required'
        ];
    }

    public function messages()
    {
      return [
        'descricao.required' => 'Atenção! Informe a descrição!',
        'descricao.max' => 'A quantidade de caracteres do campo descrição, deve ser inferior a 30',
        'telefone.required' => 'Informe um telefone válido!',
        'telefone.min' => 'Informe um telefone com no mínimo 8 números!',
        'telefone.max' => 'Informe um telefone com no máximo 9 números!',
        'cidade.required' => 'Informe uma cidade válida!',
        'ddd.required' => 'Informe um ddd válido!',
        'ddd.max' => 'Informe um ddd com no máximo 2 números!',
        'ddd.min' => 'Informe um ddd com no mínimo 2 números!',
        'endereco.required' => 'Informe um endereço válido!',
        'endereco.min' => 'Informe um endereço com no mínimo 5 caracteres!',
        'endereco.max' => 'Informe um endereço com no máximo 40 caracteres!'
      ];
    }
}
