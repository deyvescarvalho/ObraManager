<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Funcionario;
class Cargo extends Model
{
    protected $fillable = [
      'descricao'
    ];

    public function funcionarios()
    {
      return $this->hasMany(Funcionario::class);
    }
}
