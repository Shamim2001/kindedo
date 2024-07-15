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
        // $this->dispatch('close-modal');
        $this->modalClose();
    }





    // Edit Slider
    function editSlider($id) {

        // dd($id);
        $this->currentSlider = Slider::find($id);

        $this->title        = $this->currentSlider->title;
        $this->subtitle     = $this->currentSlider->subtitle;
        $this->status       = $this->currentSlider->status == 'active' ? true: false;
        $this->previewImage = $this->currentSlider->image;

        // $this->dispatch('open-modal');
        $this->modalOpen();

        // $this->reset('currentSlider');
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

        // $this->dispatch('close-modal');
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

    // function closeEditModal()  {
    //     $this->reset('currentSlider');
    //     $this->dispatch('close-edit-modal');
    // }





    function modalOpen() {
        $this->dispatch('open-modal');
    }

    function modalClose() {
        $this->dispatch('close-modal');
    }


    private function resetForm()
    {
        $this->reset(['title', 'subtitle', 'image', 'status', 'currentSlider']);
    }




    public function render()
    {
        return view('livewire.pages.slider-index',[
            'sliders' => Slider::latest()->paginate(10),
        ]);
    }
}
