<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncionarioRequest extends FormRequest
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
          'nome' => 'required',
          'idade' => 'required|min:2|size:2',
          'email' => 'email',
          'cidade' => 'required',
          'cargo_id' => 'required'
        ];
    }

    public function messages()
    {
      return [
        'nome.required' => 'Atenção! Informe um nome!',
        'idade.required' => 'Atenção! Informe uma idade!',
        'idade.min' => 'Atenção! A quantidade mínima de caracteres é 2.',
        'idade.size' => 'Atenção! A quantidade mínima de caracteres é 2.',
        'email.email' => 'Atenção! Informe um e-mail válido!',
        'cidade.required' => 'Atenção! Informe uma cidade!',
        'cargo_id.required' => 'Atenção! Informe um cargo!'
      ];
    }
}
