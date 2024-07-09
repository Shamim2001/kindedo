<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Program>
 */
class ProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->sentence(rand(3,4));
        return [
            'name'        => $name,
            'slug'        => Str::slug($name),
            'title'       => fake()->sentence(rand(3,4)),
            'subtitle'    => fake()->paragraph(),
            'excerpt'     => fake()->paragraph(),
            'description' => fake()->paragraph(rand(3, 6)),
            'image'       => 'https://picsum.photos/900/700?seed'.rand(1,1122),
        ];
    }
}
