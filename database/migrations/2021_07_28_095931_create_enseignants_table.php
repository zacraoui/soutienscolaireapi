<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnseignantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enseignants', function (Blueprint $table) {
            $table->id();
            $table->string('cin')->unique()->nullable();
            $table->string('cv')->nullable();
            $table->string('lettre_motivation')->nullable();
            $table->string('annee_bac')->nullable();
            $table->string('situation_professionnelle')->nullable();
            $table->string('specialite_etudes')->nullable();
            $table->string('situation_familiale')->nullable();
            $table->string('niveau_etudes')->nullable();
            $table->string('experience_enseignement')->nullable();
            $table->boolean('status')->default(false)->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('enseignants');
    }
}
