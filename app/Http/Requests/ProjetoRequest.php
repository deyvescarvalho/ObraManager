<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjetoRequest extends FormRequest
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
          'cliente_id' => 'required',
          'endereco' => 'required',
          'cidade' => 'required',
          'valorobra' => 'required'
        ];
    }

    public function messages()
    {
      return [
        'cliente_id.required' => 'Informe um cliente!',
        'endereco.required' => 'Informe um endereço!',
        'cidade' => 'Informe uma cidade!',
        'valorobra' => 'Informe um valor previsto para o projeto!'
      ];
    }
}
