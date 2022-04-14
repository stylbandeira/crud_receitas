<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
    use HasFactory;
    protected $fillable = ['descricao', 'nivel', 'qualidade', 'nome'];
    protected $table = 'receitas';

    public function fotos(){
        return $this->hasMany('App\Models\FotoDaReceita', 'id_receita', 'id');
    }

    public function categorias(){
        return $this->belongsToMany('App\Models\Categoria', 'categoria_receitas', 'id_receita', 'id_categoria');
        //(Model da tabela secundária, o nome da tabela auxiliar, o nome da chave primária daqui, o nome da chave primária da tabela secundária)
    }
}
