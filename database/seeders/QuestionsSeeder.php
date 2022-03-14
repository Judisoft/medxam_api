<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory;
// use Illuminate\Database\Eloquent\Factories\Factory;
 

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $answers = ['A', 'B', 'C', 'D'];
        for($j=0; $j<count($answers); $j++) { 
            for($i=0; $i< 10; $i++)
            {
                DB::table('questions')->insert([
                    'content' => $faker->sentence,
                    'image' => $faker->image(public_path('images'),400,300, null, false),
                    'A' => Str::random(10),
                    'B' => Str::random(10),
                    'C' => Str::random(10),
                    'D' => Str::random(10),
                    'E' => Str::random(10),
                    'answer' => $answers[$j],
                    'hint' => $faker->sentence,
                    'subject' => Str::random(10),
                    'topic' => Str::random(10),
                    'exam_year' => '2021'
        
                ]);  
            }
        }

    }
        
}
