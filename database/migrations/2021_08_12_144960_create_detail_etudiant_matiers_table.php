<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailEtudiantMatiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_etudiant_matiers', function (Blueprint $table) {
            $table->id();
            $table->integer('nb_heure_semaine')->nullable();
            //foreign
            $table->unsignedBigInteger('matiere_id')->nullable();
            $table->foreign('matiere_id')->references('id')->on('matieres');

            $table->unsignedBigInteger('detail_etudiant_packs_id')->nullable();
            $table->foreign('detail_etudiant_packs_id')->references('id')->on('detail_etudiant_packs');

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
        Schema::dropIfExists('detail_etudiant_matiers');
    }
}
