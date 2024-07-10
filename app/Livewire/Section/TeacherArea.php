<?php

namespace App\Livewire\Section;

use App\Models\User;
use Livewire\Component;

class TeacherArea extends Component
{
    public function render()
    {
        return view('livewire.section.teacher-area', [
            'teachers' => User::where('role', 'teacher')->take(4)->get(),
        ]);
    }
}
