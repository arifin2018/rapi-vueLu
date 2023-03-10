<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SclassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'class_name' => $this->faker->name()
        ];
    }
}
