<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailMatierCyclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_matier_cycles', function (Blueprint $table) {
            $table->id();
            $table->double('prix_heure')->nullable();
            //
            $table->unsignedBigInteger('cycle_id')->nullable();
            $table->foreign('cycle_id')->references('id')->on('cycle_scolaires');
            $table->unsignedBigInteger('matiere_id');
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
        Schema::dropIfExists('detail_matier_cycles');
    }
}
