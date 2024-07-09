<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Promo>
 */
class PromoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(rand(3,5));
        return [
            'title'       => $title,
            'slug'        => Str   :: slug($title),
            'image'       => 'https://picsum.photos/900/700?seed'.rand(1,1122),
            'subtitle'    => fake()->paragraph(),
            'description' => fake()->paragraph(rand(3,4)),
            'video_url'   => 'https://www.youtube.com/watch?v=l62SIcbCPwo'
        ];
    }
}
