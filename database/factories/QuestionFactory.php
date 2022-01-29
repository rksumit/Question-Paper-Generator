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
            'weightage' => $weightage[array_rand($weightage)],
            'difficulty_level' => $difficulty[array_rand($difficulty)],
        ];
    }
}
