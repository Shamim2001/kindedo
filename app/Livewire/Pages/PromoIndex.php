<?php

namespace App\Livewire\Pages;

use App\Models\Promo;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class PromoIndex extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $title, $excerpt, $description, $video_url, $image, $status;
    public $currentPromo;

    public $previewImage;
    public $isEdit= false;


    public function save()
    {

        // Validate the input
        $this->validate([
            'title'       => 'required|string|max: 255',
            'excerpt'     => 'nullable|string',
            'image'       => 'required',
            'description' => 'nullable',
            'video_url'   => 'nullable',
            'status'      => 'required',
        ]);

        // image save
        $thumb = null;
        if($this->image) {
            $thumb = getImageName($this->image);
            $this->image->storeAs('promos', $thumb);
        }

        // Save the Promo
        Promo::create([
            'title'       => $this->title,
            'excerpt'     => $this->excerpt,
            'description' => $this->description,
            'video_url'   => $this->video_url,
            'image'       => $thumb,
            'status'      => $this->status ? 'active': 'inactive',
        ]);

        // Message
        $this->dispatch('success',  'Promo created successfully');

        // Reset form fields
        $this->reset();

        // dispatch('close-modal');
        $this->modalClose();
    }





    // Edit Slider
    function editPromo($id) {

        $this->currentPromo = Promo::find($id);

        $this->title        = $this->currentPromo->title;
        $this->excerpt      = $this->currentPromo->excerpt;
        $this->description  = $this->currentPromo->description;
        $this->video_url    = $this->currentPromo->video_url;
        $this->status       = $this->currentPromo->status == 'active' ? true : false;
        $this->previewImage = $this->currentPromo->image;

        // dispatch('open-modal');
        $this->modalOpen();
    }


    public function update()
    {
        // Validate the input
        $this->validate([
            'title'       => 'required|string|max: 255',
            'excerpt'     => 'nullable|string',
            'image'       => 'nullable',
            'description' => 'nullable',
            'video_url'   => 'nullable',
            'status'      => 'required',
        ]);

        // upload image
        $thumb = $this->previewImage;
        if($this->image) {
            Storage::delete('promos/'. $thumb);
            $thumb = getImageName($this->image);
            $this->image->storeAs('promos', $thumb);
        }

        // Save the slider (example code)
        $this->currentPromo->update([
            'title'       => $this->title,
            'excerpt'     => $this->excerpt,
            'description' => $this->description,
            'video_url'   => $this->video_url,
            'image'       => $thumb,
            'status'      => $this->status ? 'active': 'inactive',
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
        $this->reset(['name', 'title', 'excerpt', 'description', 'video_url', 'status', 'image']);

    }


    // slider delete
    function deletePromo($id) {
        $this->dispatch('alert:confirm',
            type: 'warning',
            message: 'Do you want to delete this promo?',
            position: 'center',
            confirmButtonText: 'Yes, delete it!',
            denyButtonText: "Don't save",
            showDenylButton: false,
            showCancelButton: true,
            id: $id
        );
    }

    // Define Listener
    protected $listeners = ['deleteConfirmed'];

    // Confirmation Deleted
    public function deleteConfirmed($id)
    {
        $slider = Promo::findOrFail($id);

        if ($slider) {
            $slider->delete();
            $this->dispatch('success',  'Promo deleted successfully!');
        }
    }

    public function render()
    {
        return view('livewire.pages.promo-index', [
            'promos' => Promo::latest()->paginate(10),
        ]);
    }
}
