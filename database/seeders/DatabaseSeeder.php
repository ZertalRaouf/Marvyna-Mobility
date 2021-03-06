<?php

namespace Database\Seeders;

use App\Models\Vehicule;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(AdminSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(DriverSeeder::class);
        $this->call(EstablishmentSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(VehiculeSeeder::class);

    }
}
