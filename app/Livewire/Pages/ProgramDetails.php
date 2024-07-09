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
        $programs = Program::latest()->take(10)->get();
        return view('livewire.pages.program-details',[
            'programs' => $programs
        ]);
    }
}
