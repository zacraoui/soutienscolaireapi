<?php

namespace Database\Seeders;

use App\Models\Pack;
use Illuminate\Database\Seeder;

class PackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pack::create(
            ['nom' => "Medium petit",
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu mauris vel arcu sagittis porta. Mauris neque est',
            'nb_heure_semaine' => 12]
        );
        Pack::create(
            ['nom' => "Medium large",
            'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu mauris vel arcu sagittis porta. Mauris neque est",
            'nb_heure_semaine' => 18]
        );
        Pack::create(
            ['nom' => "Medium x large",
            'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu mauris vel arcu sagittis porta. Mauris neque est",
            'nb_heure_semaine' => 36]
        );
    }
}
