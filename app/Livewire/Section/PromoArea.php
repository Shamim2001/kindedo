<?php

namespace App\Livewire\Section;

use App\Models\Promo;
use Livewire\Component;

class PromoArea extends Component
{
    public function render()
    {
        return view('livewire.section.promo-area', [
            'promo' => Promo::latest()->first(),
        ]);
    }
}
