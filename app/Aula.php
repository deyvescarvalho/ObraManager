<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    protected $fillable = [
      'nome',
      'idade',
      'dia',
      'mes',
      'ano',
      'cpf',
      'telefone'
    ];
}
