<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailEtudiantPacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_etudiant_packs', function (Blueprint $table) {
            $table->id();
            $table->string('rythme')->nullable();
            //foreign
            $table->unsignedBigInteger('pack_id')->nullable();
            $table->foreign('pack_id')->references('id')->on('packs');

            $table->unsignedBigInteger('formation_id')->nullable();
            $table->foreign('formation_id')->references('id')->on('formations');

            $table->unsignedBigInteger('etudiant_id')->nullable();
            $table->foreign('etudiant_id')->references('id')->on('etudiants');

            $table->unsignedBigInteger('users_id')->nullable();
            $table->foreign('users_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_etudiant_packs');
    }
}
