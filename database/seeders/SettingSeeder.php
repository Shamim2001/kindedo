<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'since'            => 'Journey Since 1990',
            'address'          => '1870 N State St, California, 95482 United States',
            'phone'            => '907-200-3462',
            'support'          => 'support@mct-school.com',
            'site_title'       => 'Mct School',
            'site_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque neque aspernatur sunt! Laudantium a iure quam optio aliquid delectus rerum quos assumenda, et alias officia quo quia suscipit. Minima, voluptas!',
            'main_logo'        => 'main-logo.svg',
            'footer_logo'      => 'footer-logo.svg',
            'favicon'      => 'favicon.svg',
            'copyright'        => '© 2024 All Rights Reserved.',
        ]);
    }
}
