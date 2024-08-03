<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\Faq;
use App\Models\Gallery;
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


        User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'test',
            'email' => 'admin@kindedo.test',
            'password' => bcrypt('123'),
            'role' => 'admin'
        ]);

        $this->call(CategorySeeder::class);
        $this->call(SettingSeeder::class);

        User::factory(20)->create();
        Slider::factory(10)->create();
        Promo::factory(5)->create();
        Program::factory(20)->create();
        Faq::factory(10)->create();
        Gallery::factory(70)->create();



    }
}
