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
          'endereco' => 'required|min:5|max:40',
          'cidade' => 'required',
          'valorobra' => 'required|max:15'
        ];
    }

    public function messages()
    {
      return [
        'cliente_id.required' => 'Informe um cliente!',
        'endereco.required' => 'Informe um endereço válido!',
        'endereco.min' => 'Informe um endereço com no mínimo 5 caracteres!',
        'endereco.max' => 'Informe um endereço com no máximo 40 caracteres!',
        'cidade.required' => 'Informe uma cidade válida!',
        'valorobra.max' => 'Informe um valor com no máximo 15 caracteres!',
        'valorobra.required' => 'Informe um valor previsto para o projeto!'
      ];
    }
}
