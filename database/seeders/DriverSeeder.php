<?php

namespace Database\Seeders;

use App\Models\Driver;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Driver::create([
            'first_name'=>'john',
            'last_name'=>'doe',
            'address'=>'doe',
            'phone'=>'doe',
            'mobile'=>'doe',
            'email'=>'driver@app.com',
            'password'=>bcrypt('password'),
            'birth_date'=> now()->subYears(24),
            'nationality'=>'algérienne',
            'place_of_birth'=>'constantine',
            'security_number'=>'1234567890',
            'photo'=>'photo link',
            'licence_number'=>'1232255',
            'licence_expiration_date'=> now()->addYear(),
            'licence_photo'=>null,
            'is_available'=>true,
            'observation'=>'this is a test'
        ]);

        Driver::factory(100)->create();
    }
}
