<?php

namespace App\Livewire\Pages;

use App\Models\User;
use Livewire\Component;

class AdministrativeTeam extends Component
{
    public function render()
    {
        return view('livewire.pages.administrative-team', [
            'teachers' => User::where('role', 'teacher')->paginate(8),
        ]);
    }
}
