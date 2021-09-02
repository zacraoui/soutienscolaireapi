<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(DistrictsTableSeeder::class);

        $this->call(CycleScolaireTableSeeder::class);
        $this->call(MatiereTableSeeder::class);
        $this->call(NiveauEtudeTableSeeder::class);
        $this->call(FormationTableSeeder::class);
        $this->call(DetailMatiereCycleSeeder::class);
        $this->call(PackSeeder::class);
    }
}
