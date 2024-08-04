<?php

namespace App\Livewire\Pages;

use App\Models\Promo;
use Livewire\Component;
use App\Models\Category;

class MessageManagement extends Component
{
    public function render()
    {
         // category ID for 'about'
         $catID = Category::where('slug', 'message-from-management')->value('id');
        return view('livewire.pages.message-management',[
            'messages' => Promo::where('category_id', $catID)->orderBy('title', 'asc')->get(),
        ]);
    }
}
