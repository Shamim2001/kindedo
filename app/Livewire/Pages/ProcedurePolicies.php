<?php

namespace App\Livewire\Pages;

use App\Models\User;
use App\Models\Promo;
use Livewire\Component;
use App\Models\Category;

class ProcedurePolicies extends Component
{
    public function render()
    {
        // category ID for 'about'
        $catID = Category::where('slug', 'procedures-and-policies')->value('id');
        $parentSays = Category::where('slug', 'parents-says')->value('id');

        return view('livewire.pages.procedure-policies',[
            'procedures' => Promo::where('category_id', $catID)->whereStatus('active')->orderBy('title', 'asc')->get(),
            'parentSays' => Promo::where('category_id', $parentSays)->whereStatus('active')->orderBy('title', 'asc')->get(),
            'teachers' => User::where('role', 'teacher')->orderBy('first_name', 'asc')->paginate(10),
        ]);
    }
}
