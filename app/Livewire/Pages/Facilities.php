<?php

namespace App\Livewire\Pages;

use App\Models\User;
use App\Models\Promo;
use Livewire\Component;
use App\Models\Category;
use App\Models\Program;

class Facilities extends Component
{
    public function render()
    {
        $catId = Category::where('slug', 'facilities')->value('id');
        return view('livewire.pages.facilities', [
            'facilities' => Promo::where('category_id', $catId)->whereStatus('active')->orderBy('title', 'asc')->get(),
            'teachers' => User::where('role', 'teacher')->get(),
            'programs' => Program::latest()->paginate(12),
        ]);
    }
}
