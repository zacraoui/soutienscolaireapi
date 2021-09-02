<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::query()->delete();
        $states = [
            [
                'country_id' => 131,
                'code' => 'MA-01',
                'name' => 'Tanger-Tétouan-Al Hoceïma'
            ],[
                'country_id' => 131,
                'code' => 'MA-02',
                'name' => 'L\'Oriental'
            ],[
                'country_id' => 131,
                'code' => 'MA-03',
                'name' => 'Fès-Meknès'
            ],[
                'country_id' => 131,
                'code' => 'MA-04',
                'name' => 'Rabat-Salé-Kénitra'
            ],[
                'country_id' => 131,
                'code' => 'MA-05',
                'name' => 'Béni Mellal-Khénifra'
            ],[
                'country_id' => 131,
                'code' => 'MA-06',
                'name' => 'Casablanca-Settat'
            ],[
                'country_id' => 131,
                'code' => 'MA-07',
                'name' => 'Marrakech-Safi'
            ],[
                'country_id' => 131,
                'code' => 'MA-08',
                'name' => 'Drâa-Tafilalet'
            ],[
                'country_id' => 131,
                'code' => 'MA-09',
                'name' => 'Souss-Massa'
            ],[
                'country_id' => 131,
                'code' => 'MA-10',
                'name' => 'Guelmim-Oued Noun'
            ],[
                'country_id' => 131,
                'code' => 'MA-11',
                'name' => 'Laâyoune-Sakia El Hamra'
            ],[
                'country_id' => 131,
                'code' => 'MA-12',
                'name' => 'Dakhla-Oued Ed-Dahab'
            ],
            [
                'country_id' => 100,
                'code' => 'MA-12',
                'name' => 'Dakhla-Oued Ed-Dahab'
            ],

        ];

        State::insert($states);
    }
}
