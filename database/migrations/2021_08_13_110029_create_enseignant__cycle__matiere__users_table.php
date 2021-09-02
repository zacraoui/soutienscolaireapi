<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnseignantCycleMatiereUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enseignant__cycle__matiere__users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('enseignant_id')->nullable();
            $table->unsignedBigInteger('cycle_scolaire_id')->nullable();
            $table->unsignedBigInteger('matiere_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('enseignant_id')->references('id')->on('enseignants');
            $table->foreign('matiere_id')->references('id')->on('matieres');
            $table->foreign('cycle_scolaire_id')->references('id')->on('cycle_scolaires');
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
        Schema::dropIfExists('enseignant__cycle__matiere__users');
    }
}
