<?php

namespace Database\Seeders;

use App\Models\Niveau_etude;
use Illuminate\Database\Seeder;

class NiveauEtudeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Niveau_etude::factory()->count(50)->create();
    }
}
