<?php

namespace Database\Seeders;

use App\Models\Formation;
use Illuminate\Database\Seeder;

class FormationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Formation::create(['nom' => "Cours particulier"]);
        Formation::create(['nom' => "Cours hedomodéres"]);
        Formation::create(['nom' => "Préparation examen"]);
        Formation::create(['nom' => "Préparation concours"]);
    }
}
