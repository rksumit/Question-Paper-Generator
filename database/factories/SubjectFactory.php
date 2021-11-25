<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text($maxNbChars = 20),
            'code' => 'CSC- ' . $this->faker->numberBetween($min = 100, $max = 999),
            'description' => $this->faker->text($maxNbChars = 100),

        ];
    }
}
