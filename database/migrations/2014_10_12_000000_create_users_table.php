<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->enum('civilite',['Mr','Mme','Mlle'])->nullable();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('adresse')->nullable();
            $table->string('ville')->nullable();
            $table->string('quartier')->nullable();
            $table->string('tel')->nullable();
            $table->string('fix')->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('slug')->nullable();
            $table->string('photo_profil')->default('default.png')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
