<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
      'nome',
      'cpf',
      'email',
      'idade',
      'dia',
      'mes',
      'ano',
      'ddd',
      'telefone',
      'cidade',
      'endereco'
    ];

    public function projeto()
    {
      return $this->hasMany(Projeto::class);
    }
}
