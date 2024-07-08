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
            'title'  => fake()->title(),
            'subtitle'  => fake()->title(),
            'image'  => 'https://picsum.photos/900/900?grayscale'.rand(1,1122),
            'btn_text'  => 'Admission open',
        ];
    }
}
