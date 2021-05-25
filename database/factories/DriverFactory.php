<?php

namespace Database\Factories;

use App\Models\Driver;
use Illuminate\Database\Eloquent\Factories\Factory;

class DriverFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Driver::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name'=>$this->faker->firstName,
            'last_name'=>$this->faker->lastName,
            'address'=>$this->faker->address,
            'phone'=>$this->faker->phoneNumber,
            'mobile'=>$this->faker->phoneNumber,
            'email'=>$this->faker->unique()->email,
            'password'=>bcrypt('password'),
            'birth_date'=> now()->subYears(24),
            'nationality'=>'algérienne',
            'place_of_birth'=>'constantine',
            'security_number'=>'1234567890',
            'photo'=>'photo link',
            'licence_number'=>$this->faker->numberBetween(1111,999999),
            'licence_expiration_date'=> now()->addYear(),
            'licence_photo'=>null,
            'is_available'=>true,
            'observation'=>$this->faker->sentence,
            'longitude'=>'20',
            'position_longitude'=>'20',
            'latitude'=>'20',
            'position_latitude'=>'20',
        ];
    }
}
