<?php

namespace Database\Factories;

use App\Models\PetType;
use Illuminate\Database\Eloquent\Factories\Factory;

class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'type_id' => function() {
                return PetType::inRandomOrder()->first();
            }
        ];
    }
}
