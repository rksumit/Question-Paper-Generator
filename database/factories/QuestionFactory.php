<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $weightage = [5, 10];
        $difficulty = ['easy', 'normal', 'hard'];
        return [
            'question' => $this->faker->sentence(),
            'weightage' => 5,
            'difficulty_level' => $difficulty[array_rand($difficulty)],
        ];
    }
}
