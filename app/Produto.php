<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
      'descricao',
      'categoria_id'
    ];

    public function categoria()
    {
      return $this->belongsTo(Categoria::class);
    }

    public function projetos()
    {
      return $this->belongsToMany(Projeto::class, 'lancamento_projetos');
    }
    //
    // public function fornecedores()
    // {
    //   return $this->belongsToMany(Fornecedor::class, 'lancamento_projetos')->withPivot(['projeto_id','qtdItem']);
    // }
}
