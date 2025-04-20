<?php
namespace Database\Seeders;

use App\Models\Student;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentsTableSeeder extends Seeder
{
    public function run()
    {

        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            Student::create([
                'first_name' => $faker->firstName,
                'last_name'  => $faker->lastName,
                'email'      => $faker->unique()->safeEmail,
                'password'   => Hash::make('password'), // default password
                'number'     => $faker->phoneNumber,
            ]);
        }
    }
}
