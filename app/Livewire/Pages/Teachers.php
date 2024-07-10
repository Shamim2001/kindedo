<?php

namespace App\Livewire\Pages;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Teachers extends Component
{
    use WithPagination;


    public function render()
    {

        return view('livewire.pages.teachers', [
            'teachers' => User::where('role', 'teacher')->paginate(12),
        ]);
    }
}
