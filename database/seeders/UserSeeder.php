<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'civility'=>'1',
            'first_name'=>'raouf',
            'last_name'=>'zertal',
            'phone'=>'0751535586',
            'mobile'=>'0123456789',
            'address'=>'100 avenue simon bolivar 75019',
            'email'=>'user@app.com',
            'password'=>bcrypt('password'),
            'observation'=>"Ceci est un example d'un profil utilisateur",
        ]);

        User::factory(100)->create();
    }
}
