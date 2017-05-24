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
        'descricao' => 'required|max:15',
        'categoria_id' => 'required'
      ];
    }

    public function messages()
    {
      return [
        'descricao.required' => 'Atenção, informe uma descrição para o produto.',
        'descricao.max' => 'Atenção, o campo descrição deve conter no máximo 15 caracteres.',
        'categoria_id.required' => 'Atenção, informe uma categoria para o produto'
      ];
    }
}
