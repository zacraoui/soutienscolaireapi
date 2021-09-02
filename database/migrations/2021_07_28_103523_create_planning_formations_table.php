<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanningFormationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planning_formations', function (Blueprint $table) {
            $table->id();
            $table->string('titre')->nullable();
            $table->dateTime('date_formation')->nullable();
            $table->integer('duree_formation')->nullable();
            $table->string('color')->nullable();
            //foreign
            $table->unsignedBigInteger('enseignant_id')->nullable();
            $table->foreign('enseignant_id')->references('id')->on('enseignants');
            $table->unsignedBigInteger('formation_id')->nullable();
            $table->foreign('formation_id')->references('id')->on('formations');
            $table->unsignedBigInteger('matiere_id')->nullable();
            $table->foreign('matiere_id')->references('id')->on('matieres');
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
        Schema::dropIfExists('planning_formations');
    }
}
