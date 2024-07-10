<?php

namespace App\Livewire\Section;

use App\Models\About;
use App\Models\Faq;
use Livewire\Component;

class FaqArea extends Component
{
    public function render()
    {
        return view('livewire.section.faq-area', [
            'faqs' => Faq::whereStatus('active')->latest()->get(),
        ]);
    }
}
