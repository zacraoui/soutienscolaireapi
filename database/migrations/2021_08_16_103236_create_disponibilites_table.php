<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisponibilitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disponibilites', function (Blueprint $table) {
            $table->id();
            $table->string('jour')->nullable();
            $table->time('heure_debut')->nullable();
            $table->time('heure_fin')->nullable();
            //
            $table->unsignedBigInteger('users_id')->nullable();
            $table->foreign('users_id')->references('id')->on('users');
            $table->unsignedBigInteger('enseignant_id')->nullable();
            $table->foreign('enseignant_id')->references('id')->on('enseignants');
            $table->unsignedBigInteger('etudiant_id')->nullable();
            $table->foreign('etudiant_id')->references('id')->on('etudiants');
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
        Schema::dropIfExists('disponibilites');
    }
}
