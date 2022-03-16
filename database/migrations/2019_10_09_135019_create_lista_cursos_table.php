<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListaCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_cursos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('curso');
            $table->unsignedBigInteger('escolaridade_id');
            $table->foreign('escolaridade_id')->references('id')->on('lista_escolaridades');
            /* $table->unsignedBigInteger('formacao_id');
           $table->foreign('formacao_id')->references('id')->on('formacaos');*/
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lista_cursos');
    }
}
