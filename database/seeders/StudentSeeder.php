<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::factory(200)->create()->each(static function ($s){
            $s->users()->attach([random_int(1,100)]);
            $s->establishments()->attach([random_int(1,5)]);
        });
    }
}
