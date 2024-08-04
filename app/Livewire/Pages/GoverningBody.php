<?php

namespace App\Livewire\Pages;

use App\Models\Promo;
use Livewire\Component;
use App\Models\Category;

class GoverningBody extends Component
{
    public function render()
    {
        // category ID for 'about'
        $catID = Category::where('slug', 'governing-body')->value('id');
        return view('livewire.pages.governing-body', [
            'governings' => Promo::where('category_id', $catID)->orderBy('title', 'asc')->get(),
        ]);
    }
}
