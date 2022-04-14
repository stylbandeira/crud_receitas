<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etapa extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'descricao', 'receita_id', 'ordem'];
    protected $table = 'etapas';

    public function receita(){
        return $this->belongsTo('App\Models\Etapa', 'receita_id', 'id');
    }
}
