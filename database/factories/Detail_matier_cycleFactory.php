<?php

namespace Database\Factories;

use App\Models\Detail_matier_cycle;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Model;

class Detail_matier_cycleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Detail_matier_cycle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'prix_heure'=>$this->faker->randomFloat(2),
            'cycle_id'=>$this->faker->numberBetween(1, 5),
            'matiere_id'=>$this->faker->numberBetween(1, 20)
        ];
    }
}
