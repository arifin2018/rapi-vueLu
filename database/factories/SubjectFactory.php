<?php

namespace Database\Factories;

use App\Models\Sclass;
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
            'class_id' => Sclass::all()->random()->id,
            'subject_name' => $this->faker->name(),
            'subject_code' => $this->faker->randomNumber(3, true)
        ];
    }
}
