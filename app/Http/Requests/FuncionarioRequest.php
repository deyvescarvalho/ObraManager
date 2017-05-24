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
          'nome' => 'required|max:30 ',
          'idade' => 'required|min:2|max:3',
          'dtNascimento' => 'required',
          'email' => 'email',
          'cpf' => 'required|min:11|max:11',
          'ddd' => 'required|min:2|max:2',
          'telefone' => 'required|min:8|max:9',
          'cidade' => 'required',
          'endereco' => 'required|min:5|max:40',
          'cargo_id' => 'required'
        ];
    }

    public function messages()
    {
      return [
        'nome.required' => 'Informe um nome válido!',
        'nome.max' => 'A quantidade de caracteres do campo nome, deve ser inferior a 30',
        'cpf.required' => 'Informe um CPF válido!',
        'cpf.min' => 'Informe um CPF com no mínimo, 11 números!',
        'cpf.max' => 'Informe um CPF com no máximo, 11 números!',
        'idade.required' => 'Informe uma idade!',
        'idade.min' => 'Informe uma idade com no mínimo 2 números!',
        'idade.max' => 'Informe uma idade com no máximo 3 números!',
        'dtNascimento.required' => 'Informe uma data de nascimento válida',
        'email.email' => 'Informe um e-mail válido',
        'telefone.required' => 'Informe um telefone válido!',
        'telefone.min' => 'Informe um telefone com no mínimo 8 números!',
        'telefone.max' => 'Informe um telefone com no máximo 9 números!',
        'cidade.required' => 'Informe uma cidade válida!',
        'ddd.required' => 'Informe um ddd válido!',
        'ddd.max' => 'Informe um ddd com no máximo 2 números!',
        'ddd.min' => 'Informe um ddd com no mínimo 2 números!',
        'endereco.required' => 'Informe um endereço válido!',
        'endereco.min' => 'Informe um endereço com no mínimo 5 caracteres!',
        'endereco.max' => 'Informe um endereço com no máximo 40 caracteres!',
        'cargo_id.required' => 'Atenção! Informe um cargo!'
      ];
    }
}
