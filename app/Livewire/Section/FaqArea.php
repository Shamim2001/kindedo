<?php

namespace App\Livewire\Section;

use App\Models\About;
use Livewire\Component;

class FaqArea extends Component
{
    public function render()
    {
        return view('livewire.section.faq-area', [
            'faq' => About::whereStatus('active')->latest()->first(),
        ]);
    }
}
