<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TopicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'topic' => $this->faker->text($maxNbChars = 20),
            'hoursallocated' => $this->faker->numberBetween($min = 2, $max = 12)
        ];
    }
}
