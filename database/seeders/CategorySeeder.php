<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => "About",
            'slug' => 'about',
        ]);
        Category::create([
            'name' => "About Our School",
            'slug' => 'about-our-school',
        ]);
        Category::create([
            'name' => 'Message From Management',
            'slug' => 'message-from-management',
        ]);
        Category::create([
            'name' => 'governing body',
            'slug' => 'governing-body',
        ]);
        Category::create([
            'name' => 'teacher panel',
            'slug' => 'teacher-panel',
        ]);
        Category::create([
            'name' => 'administrative team',
            'slug' => 'administrative-team',
        ]);
        Category::create([
            'name' => 'procedures and policies',
            'slug' => 'procedures-and-policies',
        ]);
        Category::create([
            'name' => 'academics',
            'slug' => 'academics',
        ]);
        Category::create([
            'name' => 'admission',
            'slug' => 'admission',
        ]);
        Category::create([
            'name' => 'why choose guidance',
            'slug' => 'why-choose-guidance',
        ]);
        Category::create([
            'name' => 'tution fees',
            'slug' => 'tution-fees',
        ]);
        Category::create([
            'name' => 'how to apply',
            'slug' => 'how-to-apply',
        ]);
        Category::create([
            'name' => 'apply online',
            'slug' => 'apply-online',
        ]);
        Category::create([
            'name' => 'residential information',
            'slug' => 'residential-information',
        ]);
        Category::create([
            'name' => 'our facilities',
            'slug' => 'residential-information',
        ]);
        Category::create([
            'name' => 'academic calendar',
            'slug' => 'academic-calendar',
        ]);
        Category::create([
            'name' => 'news & updates',
            'slug' => 'news-updates',
        ]);
        Category::create([
            'name' => 'events',
            'slug' => 'events',
        ]);
    }
}
