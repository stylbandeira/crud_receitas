<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoDaReceita extends Model
{
    protected $table = 'foto_da_receita';
    protected $fillable = ['url_img', 'id_receita'];
    use HasFactory;

    public function receita(){
        return $this->hasOne('App\Models\Receita', 'id', 'id_receita');
    }
}
