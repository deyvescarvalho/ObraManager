<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $fillable = [
      'nome',
      'cpf',
      'email',
      'cargo',
      'idade',
      'dia',
      'mes',
      'ano',
      'ddd',
      'telefone',
      'cidade',
      'endereco'
    ];
}
