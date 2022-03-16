<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitacaos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('numero')->nullable();
            $table->string('nivel')->nullable();
            $table->string('qtd_contratacao')->nullable();
            $table->string('tel_secretaria')->nullable();
            $table->string('responsavel')->nullable();
            $table->date('horarios')->nullable();
            $table->string('tipo_contratacao')->nullable();
            $table->string('nome_estagiario')->nullable();
            $table->longText('informacoes')->nullable();
            $table->unsignedBigInteger('recrutador_id');
            $table->foreign('recrutador_id')->references('id')->on('recrutadors');
            $table->unsignedBigInteger('secretaria_id');
            $table->foreign('secretaria_id')->references('id')->on('secretarias');
            $table->string('last_state')->default('criada');
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
        Schema::dropIfExists('solicitacaos');
    }
}
