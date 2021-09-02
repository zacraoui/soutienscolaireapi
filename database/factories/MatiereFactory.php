<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Matiere;
use Illuminate\Support\Str;

class MatiereFactory extends Factory{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */

    protected $model = Matiere::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'nom'=>$this->faker->word(),
            'description'=>$this->faker->text(),
            // 'prix_heure'=>$this->faker->randomFloat(2),
        ];
    }
}
