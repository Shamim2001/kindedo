<?php

namespace App\Livewire\Pages;

use App\Models\Faq;
use App\Models\Program;
use App\Models\Promo;
use Livewire\Component;
use Livewire\WithPagination;

class Programs extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.pages.programs', [
            'programs' => Program::latest()->paginate(12),
            'promo' => Promo::latest()->first(),
        ]);
    }
}
