<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotoDaReceitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('foto_da_receitas');
        Schema::dropIfExists('foto_da_receita');
        Schema::create('foto_da_receita', function (Blueprint $table) {
            $table->id();
            $table->string('url_img');
            $table->unsignedBigInteger('id_receita');
            $table->timestamps();

            //constraint
            $table->foreign('id_receita')->references('id')->on('receitas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foto_da_receita');
    }
}
