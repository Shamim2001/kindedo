<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\About>
 */
class FaqFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'   => fake()->sentence(rand(3, 5)),
            'name'   => fake()->sentence(rand(4, 6)),
            'content' => fake()->paragraph(rand(4, 6)),
            'image'   => 'https://picsum.photos/900/700?seed'.rand(1,1122),
            'status'  => fake()->randomElement(['active', 'inactive'])
        ];
    }
}
