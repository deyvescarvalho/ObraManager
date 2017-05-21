<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
      'nome',
      'user_id',
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

    public function usuario()
    {
      return $this->belongsTo(User::class);
    }
}
