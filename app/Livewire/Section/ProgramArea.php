<?php

namespace App\Livewire\Section;

use App\Models\Program;
use Livewire\Component;

class ProgramArea extends Component
{
    public function render()
    {
        return view('livewire.section.program-area', [
            'programs' => Program::latest()->take(10)->get(),
        ]);
    }
}
