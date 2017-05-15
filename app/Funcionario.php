<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cargo;
class Funcionario extends Model
{
  protected $table = 'cargos';
    protected $fillable = [
      'nome',
      'cpf',
      'email',
      'cargo_id',
      'idade',
      'dia',
      'mes',
      'ano',
      'ddd',
      'telefone',
      'cidade',
      'endereco'
    ];

    public function cargo()
    {
      return $this->belongsTo(Cargo::class, 'cargos');
    }

    public function projetos()
    {
      return $this->belongsToMany(Projeto::class, 'lancamento_projetos_funcionarios');
    }
}
