<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FormacoesAdicionaRelacionamentoListaCurso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('formacaos', function (Blueprint $table) {
            $table->unsignedBigInteger('lista_curso_id');
            $table->foreign('lista_curso_id')->references('id')->on('lista_cursos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
