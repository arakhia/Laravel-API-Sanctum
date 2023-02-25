<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssignmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'student_id' => Student::factory(),
            'course_id' => Course::factory(),
            'grade' => $this->faker->numberBetween(0, 100),
            'opened_at' => $this->faker->dateTime(),
            'solved_at' => $this->faker->dateTime(),
        ];
    }
}
