<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCamposToCandidato extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('candidatos', function (Blueprint $table) {
            $table->string('nomesocial');
            //$table->string('deficiencia');
            $table->char('raca', 1);
            $table->char('deficiencia_fisica', 1);
            $table->char('deficiencia_intelectual', 1);
            $table->char('deficiencia_multipla', 1);
            $table->char('deficiencia_tea', 1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('candidato', function (Blueprint $table) {
            //
        });
    }
}
