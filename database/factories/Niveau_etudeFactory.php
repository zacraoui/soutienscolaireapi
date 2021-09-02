<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Niveau_etude;

class Niveau_etudeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Niveau_etude::class;

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
            'cycle_id'=>$this->faker->numberBetween(1, 5)
        ];
    }
}
