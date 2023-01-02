<?php

namespace Database\Factories;

use App\Models\Sclass;
use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
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
            'section_id' => Section::all()->random()->id,
            'name'      => $this->faker->name(),
            'phone'     => $this->faker->regexify('[0-9]{12}'),
            'email'     => $this->faker->userName . '@gmail.com',
            'password'  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'photo'     => $this->faker->imageUrl(640, 500, 'animals', true),
            'address'   => $this->faker->address,
            'gender'    => $this->faker->randomElement(['male', 'female'])
        ];
    }
}
