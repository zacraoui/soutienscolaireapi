<?php

namespace Database\Factories;

use App\Models\Cycle_scolaire;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Model;

class Cycle_ScolaireFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cycle_scolaire::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom'=>$this->faker->word(),
            'description'=>$this->faker->text()
        ];
    }
}
