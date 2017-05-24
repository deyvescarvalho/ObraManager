<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'nome' => 'required|max:30 ',
            'cpf' => 'required|min:11|max:11',
            'email' => 'email',
            'idade' => 'nullable',
            'dtNascimento' => 'required',
            // 'mes' => 'nullable',
            // 'ano' => 'nullable',
            'telefone' => 'required',
            'cidade' => 'required',
            'endereco' => 'required'
        ];
    }

    public function messages()
    {
      return [
        'nome.required' => 'Informe um nome válido!',
        'nome.max' => 'A quantidade de caracteres, deve ser inferior a 30',
        'dtNascimento.required' => 'Informe uma data de nascimento válida',
        'email.email' => 'Informe um e-mail válido',
        'telefone.required' => 'Informe um telefone válido!',
        'cidade.required' => 'Informe uma cidade válida!',
        'endereco.required' => 'Informe um endereço válido!'
      ];

    }
}
