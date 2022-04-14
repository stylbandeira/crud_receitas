<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['nome'];
    protected $table = 'categorias';
    use HasFactory;

    public function receitas(){
        return $this->belongsToMany('App\Models\Receita', 'categoria_receitas', 'id_categoria', 'id_receita');
    }
}
