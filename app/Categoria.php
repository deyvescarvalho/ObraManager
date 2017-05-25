<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
      'descricao',
      'user_id'
    ];

    public function produtos()
    {
      return $this->hasMany(Produto::class);
    }

    public function usuario()
    {
      return $this->belongsTo(User::class);
    }
}
