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
}
