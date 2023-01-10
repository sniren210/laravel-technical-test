<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BarangFactory extends Factory
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
            'jumlah' => $this->faker->randomNumber(1),
            'user_id' => 1,
            'supplier_id' => $this->faker->numberBetween(1, 3),

        ];
    }
}
