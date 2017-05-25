<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Funcionario;
use App\User;
class Cargo extends Model
{
    protected $fillable = [
      'descricao',
      'user_id'
    ];

    public function funcionarios()
    {
      return $this->hasMany(Funcionario::class);
    }

    public function usuario()
    {
      return $this->belongsTo(User::class);
    }
}
