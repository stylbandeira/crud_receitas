<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
    use HasFactory;
    protected $fillable = ['descricao', 'nivel', 'qualidade', 'nome'];
    protected $table = 'receitas';

    public function rules()
    {
        return [
            'nivel' => 'required|numeric|between:0,5',
            'qualidade' => 'required|numeric|between:0,5',
            'descricao' => 'required',
            'nome' => 'required',
        ];
    }

    public function feedback(){
        return [
            'between' => 'O valor de :attribute deve estar entre 0 e 5',
            'required' => 'O campo :attribute é necessário'
        ];
    }

    public function fotos()
    {
        return $this->hasMany('App\Models\FotoDaReceita', 'id_receita', 'id');
    }

    public function categorias()
    {
        return $this->belongsToMany('App\Models\Categoria', 'categoria_receitas', 'id_receita', 'id_categoria');
        //(Model da tabela secundária, o nome da tabela auxiliar, o nome da chave primária daqui, o nome da chave primária da tabela secundária)
    }

    public function etapas()
    {
        return $this->hasMany('App\Models\Etapa', 'receita_id', 'id');
    }
}
