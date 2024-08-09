<?php

namespace App\Livewire\Pages;

use App\Models\Course;
use Livewire\Component;

class AcademicCalender extends Component
{


    public function render()
    {
        return view('livewire.pages.academic-calender',[
            'academic' => Course::where('slug', 'academic-calender')->first(),
        ]);
    }
}
