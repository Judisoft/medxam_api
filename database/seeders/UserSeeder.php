<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 50; $i++) {
            DB::table('users')->insert([
                'email'     => $faker->unique()->email,
                'password'    => "password",
                'first_name' => $faker->unique()->firstName,
                'last_name' => $faker->unique()->lastName,
                'telephone'     => $faker->numerify('#########'),
                'level' => 1,
                'institution' => $faker->text(10),
                'email_verification_token' => "password",
                'bio' => $faker->sentence(5),
                'email_verified' => 1,
                'image' => $faker->image(public_path('images'),400,300, null, false),
            ]);
        }
    }
}
