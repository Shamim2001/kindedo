<?php

namespace App\Livewire\Pages;

use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class SliderIndex extends Component
{
    use WithFileUploads;

    public $title, $subtitle, $image, $status;
    public $currentSlider;
    public $previewImage;

    // Edit Slider
    function editSlider($id) {
        $this->currentSlider = Slider::find($id);

        $this->title = $this->currentSlider->title;
        $this->subtitle = $this->currentSlider->subtitle;
        $this->status = $this->currentSlider->status == 'active' ? true : false;
        $this->previewImage = $this->currentSlider->image;

        $this->dispatch('open-edit-modal');
    }

    function closeEditModal()  {
        $this->reset('currentSlider');
        $this->dispatch('close-edit-modal');
    }

    public function update()
    {
        // dd($this->status);

        // Validate the input
        $this->validate([
            'title'    => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'image'    => 'nullable',
            'status'   => 'required',
        ]);

        // If image
        if($this->image) {
            Storage::delete('sliders/'. $this->previewImage);
            $filename = getImageName($this->image->getClientOriginalName());
            $this->image->storeAs('sliders', $filename);
        }



        // Save the slider (example code)
        $this->currentSlider->update([
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'image' => $this->image ?  $filename : $this->previewImage,
            'status' => $this->status ? 'active': 'inactive',
        ]);


        $this->closeEditModal();

    }



    function modalOpen() {
        $this->dispatch('open-modal');
    }

    function modalClose() {
        $this->dispatch('close-modal');
    }



    public function save()
    {
        // dd($this->status);

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
    }

    public function render()
    {
        return view('livewire.pages.slider-index',[
            'sliders' => Slider::latest()->paginate(10),
        ]);
    }
}
