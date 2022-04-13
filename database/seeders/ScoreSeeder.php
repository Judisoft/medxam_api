<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use App\Models\Score;

class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for($i=0; $i < 12; $i++ ) {

            DB::table('scores')->insert([
                'user_id'=> 22,
                'week_id' => $i,
                'bio' => $faker->randomDigit,    
                'chem' => $faker->randomDigit,  
                'phy' => $faker->randomDigit,  
                'gen_know' => $faker->randomDigit,  
                'lang' => $faker->randomDigit,
                'total' => $faker->randomDigit, 
                'created_at' => $faker->dateTimeThisMonth(),
                'updated_at' => $faker->dateTimeThisMonth()
            ]);
        }
    }
}
