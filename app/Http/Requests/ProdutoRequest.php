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
        return false;
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
          'categoria_id' => 'required'
        ];
    }

    public function messages()
    {
      return [
        'descricao.required' => 'Atenção, informe uma descrição para o produto.',
        'categoria_id.required' => 'Atenção, informe uma categoria para o produto'
      ];
    }
}
