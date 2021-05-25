<?php

namespace Database\Factories;

use App\Models\Driver;
use App\Models\Vehicule;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehiculeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vehicule::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code'=>$this->faker->postcode,
            'type'=>$this->faker->numberBetween(10,30),
            'matriculation'=>$this->faker->numberBetween(1111,999999),
            'matriculation_date'=>now()->subYears(10),
            'first_circulation_date'=>now()->subYears(10),
            'is_rentable'=>true,
            'brand'=>$this->faker->company,
            'model'=> now()->subYears(24),
            'motorization'=>$this->faker->company,
            'fuel'=>$this->faker->numberBetween(10,30),
            'color'=>$this->faker->colorName,
            'number_of_places'=>$this->faker->numberBetween(10,30),
            'tax_horses'=>$this->faker->numberBetween(1111,999999),
            'serial_number'=> $this->faker->numberBetween(1111,999999),
            'initial_number_of_km'=>$this->faker->numberBetween(1111,999999),
            'mode_of_aquisition'=>$this->faker->numberBetween(10,30),
            'key_double_location'=>$this->faker->sentence,
            'observation'=>$this->faker->sentence,
        ];
    }
}
