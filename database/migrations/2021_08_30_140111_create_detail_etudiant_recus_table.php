<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailEtudiantRecusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_etudiant_recus', function (Blueprint $table) {
            $table->id();
            $table->string('nom_recu')->nullable();
            $table->boolean('is_validate')->nullable();
            //foreign
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
        Schema::dropIfExists('detail_etudiant_recus');
    }
}
