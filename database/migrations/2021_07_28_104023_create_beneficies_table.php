<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficies', function (Blueprint $table) {
            $table->id();
            $table->integer('nb_heure_mois')->nullable();
            $table->double('prix_heure')->nullable();
            $table->unsignedBigInteger('enseignant_id')->nullable();
            $table->foreign('enseignant_id')->references('id')->on('enseignants');
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
        Schema::dropIfExists('beneficies');
    }
}
