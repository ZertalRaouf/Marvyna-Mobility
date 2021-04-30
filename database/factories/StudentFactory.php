<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'civility' => random_int(1,2),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'birth_date' => now()->subYears(random_int(10,15)),
            'enter_date' => now(),
            'leave_date' => now()->addYears(random_int(1,5)),
            'observation' => $this->faker->sentence,
            'specificity' => $this->faker->sentence,
            'disability' => $this->faker->sentence,
        ];
    }
}
