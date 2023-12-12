<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'title' => fake()->text(20),
            'description' => fake()->text(100),
            'user_id' => 1,
            // 'date_created' =>fake()->date()

            // 'title' => fake()->text(20),
            // 'description' => fake()->text(100),
            // 'user_id' => 2,
            // 'date_created' =>fake()->date()
            
            // 'title' => fake()->text(20),
            // 'description' => fake()->text(100),
            // 'user_id' => 3,
            // 'date_created' =>fake()->date()

            // 'title' => fake()->text(20),
            // 'description' => fake()->text(100),
            // 'user_id' => 4,
            // 'date_created' =>fake()->date()

            // 'title' => fake()->text(20),
            // 'description' => fake()->text(100),
            // 'user_id' => 5,
            // 'date_created' =>fake()->date()
        ];
    }
}