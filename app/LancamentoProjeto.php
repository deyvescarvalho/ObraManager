<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Projeto;
class LancamentoProjeto extends Model
{
    protected $fillable = [
      'projeto_id',
      'fornecedor_id',
      'item_id',
      'dataLancamento',
      'valorItem',
      'qtdItem',
      'total'
    ];


    public function projeto()
    {
      return $this->belongsTo(Projeto::class);
    }

    public function fornecedor()
    {
      return $this->belongsTo(Fornecedor::class);
    }
    
    public function fornecedor()
    {
      return $this->belongsTo(Fornecedor::class);
    }
}
