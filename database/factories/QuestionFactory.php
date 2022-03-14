<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => $this->faker->content,
            'image' => $this->faker->image('public/storage/images',640,480, null, false),
            'A' => Str::random(10),
            'B' => Str::random(10),
            'C' => Str::random(10),
            'D' => Str::random(10),
            'E' => Str::random(10),
            'answer' => 'B',
            'hint' => $this->faker->hint,
            'subject' => Str::random(10),
            'topic' => Str::random(10),
            'exam_year' => '2021',
        ];
    }
}
