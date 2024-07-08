<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'  => fake()->sentence(rand(4, 6)),
            'subtitle'  => fake()->sentence(rand(3,5)),
            'image'  => 'https://picsum.photos/900/700?grayscale'.rand(1,1122),
            'btn_text'  => 'Admission open',
        ];
    }
}
