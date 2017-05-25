<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\belongsTo;
use App\LancamentoProjeto;
use App\Cliente;
use App\Funcionario;
class Projeto extends Model
{
    protected $fillable = [
      'cliente_id',
      'endereco',
      'user_id',
      'cidade',
      'valorobra'
    ];

    public function cliente()
    {
      return $this->belongsTo(Cliente::class);
    }

    public function funcionarios()
    {
      return $this->belongsToMany(Funcionario::class, 'lancamento_projetos_funcionarios')->withPivot(['dataLancamento', 'valorSalario']);
    }

    public function produtos()
    {
      return $this->belongsToMany(Produto::class, 'lancamento_projetos')->withPivot(['fornecedor_id','dataLancamento','valorItem','qtdItem']);
    }

    public function usuario()
    {
      return $this->belongsTo(User::class);
    }

    // public function fornecedores()
    // {
    //   return $this->belongsToMany(Fornecedor::class, 'lancamento_projetos');
    // }


}
