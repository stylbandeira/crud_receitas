<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCategoriaReceita extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categoria_receitas', function (Blueprint $table){
            $table->dropForeign('categoria_receitas_id_receita_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categoria_receitas', function (Blueprint $table){
            $table->foreign('id_receita')->references('id')->on('receitas');
        });
    }
}
