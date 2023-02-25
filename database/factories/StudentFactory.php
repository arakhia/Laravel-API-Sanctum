<?php

namespace Database\Factories;

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
            'name' => $this->faker->name(),
            'email' => $this->faker->name(),
            'date_of_birth' => $this->faker->date(),
            'major' => $this->faker->randomElement(['CS', 'Math', 'Phys', 'Law', 'Engineering']),
            'address' => $this->faker->streetAddress()
        ];
    }
}
