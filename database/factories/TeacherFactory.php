<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address' => $this->faker->address(),
            'qualification' => 'Masters',
            'experience' => 'Test Experience',
            'phone' => $this->faker->phoneNumber()
        ];
    }
}
