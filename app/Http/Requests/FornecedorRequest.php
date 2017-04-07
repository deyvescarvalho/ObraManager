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
          'descricao' => 'required',
          'ddd' => 'required',
          'telefone' => 'required',
          'endereco' => 'required',
          'cidade' => 'required'
        ];
    }

    public function messages()
    {
      return [
        'descricao.required' => 'Atenção! Informe a descricao!',
        'ddd.required' => 'Atenção! Informe o ddd!',
        'telefone.required' => 'Atenção! Informe o telefone!',
        'endereco.required' => 'Atenção! Informe o endereço!',
        'cidade.required' => 'Atenção! Informe a cidade!'
      ];
    }
}
