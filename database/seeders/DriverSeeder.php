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
            'birth_date'=>'23-08-1997',
            'nationality'=>'algérienne',
            'place_of_birth'=>'constantine',
            'security_number'=>'1234567890',
            'photo'=>'photo link',
            'licence_number'=>'required|string|max:45',
            'licence_expiration_date'=>'required|date',
            'licence_photo'=>'required|file|image|max:10000',
            'is_available'=>'required|string',
            'observation'=>'sometimes|nullable|string|max:450'
        ]);
    }
}
