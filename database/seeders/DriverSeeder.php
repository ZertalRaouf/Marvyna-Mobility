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
            'first_name'=>'Raouf',
            'last_name'=>'Zertal',
            'address'=>'100 avenue simon bolivar 75019',
            'phone'=>'+33 751 53 55 86',
            'mobile'=>'+33 751 53 55 86',
            'email'=>'driver@app.com',
            'password'=>bcrypt('password'),
            'birth_date'=> now()->subYears(24),
            'nationality'=>'Algérienne',
            'place_of_birth'=>'Constantine',
            'security_number'=>'1234567890',
            'photo'=>'photo link',
            'licence_number'=>'1234567890',
            'licence_expiration_date'=> now()->addYear(),
            'licence_photo'=>null,
            'is_available'=>true,
            'observation'=>'Ceci est une observation',
            'longitude'=>'20',
            'latitude'=>'20',
        ]);

        Driver::factory(100)->create();
    }
}
