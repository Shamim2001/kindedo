<?php

namespace App\Livewire\Utils;

use App\Models\Slider;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class AddSlider extends Component
{
    use WithFileUploads;

    public $title, $subtitle, $image, $status;


    public function save()
    {
        dd($this->status);

        // Validate the input
        $this->validate([
            'title'    => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'image'    => 'required',
            'status'   => 'required',
        ]);

        // If image
        if($this->image) {
            $filename = getImageName($this->image->getClientOriginalName());
            $image = $this->image->storeAs('sliders', $filename);
        }



        // Save the slider (example code)
        Slider::create([
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'image' => $filename,
            'status' => $this->status ? 'active': 'inactive',
        ]);

        // Reset form fields
        $this->reset();

        // Emit event to close the modal (optional)
        // $this->emit('sliderAdded');
    }


    public function render()
    {
        return view('livewire.utils.add-slider');
    }
}
