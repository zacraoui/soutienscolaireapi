<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\State;
use Illuminate\Database\Seeder;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        District::query()->delete();
        $districts = [
            [
                'city_id' => 2486,
                'name' => 'Agdal'
            ],[
                'city_id' => 2486,
                'name' => 'Akkari'
            ],[
                'city_id' => 2486,
                'name' => 'Ambassadeurs'
            ],[
                'city_id' => 2486,
                'name' => 'Aviation'
            ],[
                'city_id' => 2486,
                'name' => 'Fath'
            ],[
                'city_id' => 2486,
                'name' => 'Hay Nahda'
            ],[
                'city_id' => 2486,
                'name' => 'Hay Riad'
            ],[
                'city_id' => 2486,
                'name' => 'Océan'
            ],[
                'city_id' => 2486,
                'name' => 'Mabella'
            ],[
                'city_id' => 2486,
                'name' => 'Massira'
            ],[
                'city_id' => 2486,
                'name' => 'Médina'
            ],[
                'city_id' => 2486,
                'name' => 'Orangers'
            ],
            [
                'city_id' => 2486,
                'name' => 'Oudaya'
            ],
            [
                'city_id' => 2486,
                'name' => 'Souissi'
            ],
            [
                'city_id' => 2486,
                'name' => 'Takadoum'
            ],
            [
                'city_id' => 2486,
                'name' => 'Témara'
            ],[
                'city_id' => 2486,
                'name' => 'Yacoub El Mansour'
            ],[
                'city_id' => 2486,
                'name' => 'Youssoufia'
            ],

        ];

        District::insert($districts);
    }
}
