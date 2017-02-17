<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    protected $fillable = [
      'nome',
      'idade',
      'dtNascimento',
      'cpf',
      'telefone'
    ];
}
