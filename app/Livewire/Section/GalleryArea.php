<?php

namespace App\Livewire\Section;

use App\Models\Gallery;
use Livewire\Component;

class GalleryArea extends Component
{

    public function render()
    {
        return view('livewire.section.gallery-area', [
            'galleries' => Gallery::latest()->take(20)->get(),
        ]);
    }
}
