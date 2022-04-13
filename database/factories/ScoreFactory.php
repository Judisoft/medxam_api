<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ScoreFactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 100),
            'week_id' => $this->faker->numberBetween(1, 12),
            'bio' => $this->faker->numberBetween(1, 60),    
            'chem' => $this->faker->numberBetween(1, 30),  
            'phy' => $this->faker->numberBetween(1, 30),  
            'gen_know' => $this->faker->numberBetween(1, 10),  
            'lan' => $this->faker->numberBetween(1, 10),
            'total' => $this->faker->numberBetween(1, 140), 
            'created_at' => $this->faker->dateTimeThisMonth(),
            'updated_at' => $this->faker->dateTimeThisMonth()

        ];
    }
}
