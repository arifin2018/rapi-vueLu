<?php

namespace Database\Factories;

use App\Models\Sclass;
use Illuminate\Database\Eloquent\Factories\Factory;

class SectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'class_id'  => Sclass::all()->random()->id,
            'section_name'  => $this->faker->name()
        ];
    }
}
