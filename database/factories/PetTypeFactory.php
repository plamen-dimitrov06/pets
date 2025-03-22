<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PetTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->unique()->randomElement(['cat', 'dog', 'parrot'])
        ];
    }
}
