<?php

namespace App\Livewire\Pages;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class SliderIndex extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public $title, $subtitle, $image, $status;
    public $currentSlider;

    public $previewImage;
    public $isEdit= false;


    public function save()
    {

        // Validate the input
        $this->validate([
            'title'    => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'image'    => 'required',
            'status'   => 'required',
        ]);

        // image save
        if($this->image) {
            $filename = getImageName($this->image->getClientOriginalName());
            $this->image->storeAs('sliders', $filename);
        }

        // Save the slider
        Slider::create([
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'image' => $filename,
            'status' => $this->status ? 'active': 'inactive',
        ]);

        // Message
        $this->dispatch('success',  'Slider created successfully');

        // Reset form fields
        $this->reset();

        // dispatch('close-modal');
        $this->modalClose();
    }





    // Edit Slider
    function editSlider($id) {

        $this->currentSlider = Slider::find($id);

        $this->title        = $this->currentSlider->title;
        $this->subtitle     = $this->currentSlider->subtitle;
        $this->status       = $this->currentSlider->status == 'active' ? true: false;
        $this->previewImage = $this->currentSlider->image;

        // dispatch('open-modal');
        $this->modalOpen();
    }


    public function update()
    {
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


        $this->reset();

        $this->modalClose();

    }

    public function submit()
    {
        if ($this->isEdit) {
            $this->update();
        } else {
            $this->save();
        }
    }

    // modal open model
    function modalOpen() {
        $this->dispatch('open-modal');
    }

    // close modal
    function modalClose() {
        $this->dispatch('close-modal');
    }


    // slider delete
    function deleteSlider($id) {

        $this->dispatch('alert:confirm',
            type: 'warning',
            message: __('Do you want to delete this product?'),
            position: 'center',
            confirmButtonText: 'Yes, delete it!',
            denyButtonText: "Don't save",
            showDenylButton: false,
            showCancelButton: true,
            slider: $id
        );
    }

    // Define Listener
    protected $listeners = ['deleteConfirmed'];

    // Confirmation Deleted
    public function deleteConfirmed($id)
    {
        $slider = Slider::findOrFail($id);

        if ($slider) {
            $slider->delete();
            $this->dispatch('success',  'Slider deleted successfully');
        }
    }




    public function render()
    {
        return view('livewire.pages.slider-index',[
            'sliders' => Slider::latest()->paginate(10),
        ]);
    }
}
