<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\About>
 */
class AboutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(rand(3, 5)),
            'about' => fake()->paragraph(rand(4, 6)),
            'child_desc' => fake()->paragraph(rand(3, 5)),
            'year_desc' => fake()->paragraph(rand(3, 5)),
            'image' => 'https://picsum.photos/900/700?seed'.rand(1,1122),
            'status' => fake()->randomElement(['active', 'inactive'])
        ];
    }
}
