<?php

namespace App\Livewire\Pages;

use App\Models\User;
use App\Models\Promo;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class About extends Component
{
    use WithPagination;

    public function render()
    {
        // category ID for 'about'
        $catID = Category::where('slug', 'about')->value('id');

        return view('livewire.pages.about', [
            'abouts' => Promo::where('category_id', $catID)->orderBy('title', 'asc')->get(),
            'teachers' => User::where('role', 'teacher')->orderBy('first_name', 'asc')->paginate(10),
        ]);
    }
}
