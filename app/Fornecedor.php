<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $fillable = [
      'descricao',
      'ddd',
      'telefone',
      'endereco',
      'cidade'
    ];

    public function projetos()
    {
      return $this->belongsToMany(Projeto::class, 'lancamento_projetos');
    }

    public function produtos()
    {
      return $this->belongsToMany(Produto::class, 'lancamento_projetos');
    }




}
