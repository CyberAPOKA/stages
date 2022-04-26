<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfissionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profissionals', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('cursosrealizados', 4000)->nullable();
            $table->string('outrosconhecimentos', 4000)->nullable();
            $table->string('experienciasprofissionais', 4000)->nullable();
            $table->enum('jafoiestagiario',['sim','nao']);
            $table->string('inicioperiodo')->nullable();
            $table->string('fimperiodo')->nullable();
            $table->string('secretaria')->nullable();

            $table->unsignedBigInteger('candidato_id');
            $table->foreign('candidato_id')->references('id')->on('candidatos');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profissionals');
    }
}
