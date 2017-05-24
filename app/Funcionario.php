<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cargo;
class Funcionario extends Model
{
    protected $fillable = [
      'nome',
      'cpf',
      'user_id',
      'email',
      'cargo_id',
      'idade',
      'dtNascimento',
      'ddd',
      'telefone',
      'cidade',
      'endereco'
    ];

    public function cargo()
    {
      return $this->belongsTo(Cargo::class);
    }

    public function projetos()
    {
      return $this->belongsToMany(Projeto::class, 'lancamento_projetos_funcionarios');
    }

    public function usuario()
    {
      return $this->belongsTo(User::class);
    }
}
