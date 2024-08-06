<?php

namespace App\Livewire\Pages;

use App\Models\Gallery;
use Livewire\Component;

class GalleryPage extends Component
{
    public function render()
    {
        return view('livewire.pages.gallery-page',[
            'galleries' => Gallery::latest()->get(),
        ]);
    }
}
