<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSecretariaIdToRecrutadors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recrutadors', function (Blueprint $table) {
            $table->unsignedBigInteger('secretaria_id');
            $table->foreign('secretaria_id')->references('id')->on('secretarias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recrutadors', function (Blueprint $table) {
            //
        });
    }
}
