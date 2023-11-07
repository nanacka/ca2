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
            //'title' => $this->faker->unique()->sentence(4),
            //'description' => $this->faker->text(100),


            'title' => fake()->title(),
            'description' => fake()->description()


            
        ];
    }
}
