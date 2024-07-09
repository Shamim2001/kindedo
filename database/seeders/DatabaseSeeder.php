<?php

namespace Database\Seeders;

use App\Models\Program;
use App\Models\Promo;
use App\Models\Slider;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@kindedo.test',
            'password' => bcrypt('123'),
        ]);

        Slider::factory(10)->create();
        Promo::factory(5)->create();
        Program::factory(20)->create();
    }
}
