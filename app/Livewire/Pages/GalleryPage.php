<?php

namespace App\Livewire\Pages;

use App\Models\Gallery;
use Livewire\Component;
use Livewire\WithPagination;

class GalleryPage extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.pages.gallery-page',[
            'galleries' => Gallery::latest()->paginate(20),
        ]);
    }
}
