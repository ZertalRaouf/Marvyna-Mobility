<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'civility'=>'1',
            'first_name'=> $this->faker->name,
            'last_name'=> $this->faker->name,
            'phone'=>'0751535586',
            'mobile'=>'0123456789',
            'address'=>$this->faker->address,
            'email'=>$this->faker->unique()->email,
            'password'=>bcrypt('password'),
            'observation'=> $this->faker->sentence,
            'longitude'=>'20',
            'latitude'=>'20',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
