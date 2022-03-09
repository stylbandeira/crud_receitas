<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaReceita extends Model
{
    protected $fillable = ['id_receita', 'id_categoria'];
    use HasFactory;
}
