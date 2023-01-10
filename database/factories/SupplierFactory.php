<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence($nbWords = 3, $variableNbWords = true),
            'desc' => $this->faker->paragraph($nbSentences = 2, $variableNbSentences = true),
        ];
    }
}
