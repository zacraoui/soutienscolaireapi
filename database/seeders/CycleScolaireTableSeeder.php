<?php

namespace Database\Seeders;

use App\Models\Cycle_scolaire;
use Illuminate\Database\Seeder;

class CycleScolaireTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cycle_scolaire::query()->delete();
        $cycle_scolaires = [
            [
                'nom' => 'Primaire'
            ],[
                'nom' => 'Collège'
            ],[
                'nom' => 'Lycée (Sauf scientifiques)'
            ],[
                'nom' => 'Lycée y compris scientifiques'
            ],[
                'nom' => 'Supérieur '
            ]
        ];

        Cycle_scolaire::insert($cycle_scolaires);
    }
}
