<?php

namespace App\Livewire\Pages;

use App\Models\Program;
use Livewire\Component;

class ProgramDetails extends Component
{
    public $program;


    public function mount($program)
    {
        $this->program = $program;
    }

    public function render()
    {

        return view('livewire.pages.program-details',[
            'programs' => Program::latest()->take(10)->get(),
        ]);
    }
}
