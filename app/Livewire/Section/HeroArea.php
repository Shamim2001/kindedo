<?php

namespace App\Livewire\Section;

use App\Models\Slider;
use Livewire\Component;

class HeroArea extends Component
{
    public function render()
    {
        $sliders = Slider::whereStatus('active')->get();
        return view('livewire.section.hero-area', [
            'sliders' => $sliders
        ]);
    }
}
