<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\Category;
use App\Models\User;

class TeacherPanel extends Component
{
    public function render()
    {

        return view('livewire.pages.teacher-panel',[
            'teachers' => User::where('role', 'teacher')->paginate(8),
        ]);
    }
}
