<?php

namespace Database\Seeders;

use App\Models\Detail_matier_cycle;
use Illuminate\Database\Seeder;

class DetailMatiereCycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Detail_matier_cycle::factory()->count(50)->create();
    }
}
