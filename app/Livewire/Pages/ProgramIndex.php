<?php

namespace App\Livewire\Pages;

use App\Models\Gallery;
use App\Models\Program;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProgramIndex extends Component
{
    use WithFileUploads;

    public $name, $title, $subtitle, $excerpt, $description, $image;
    public $currentProgram;

    public $gallery = [];
    public $media = [];
    public $previewImage;
    public $isEdit = false;

    public function save()
    {
        // Validate the input fields
        $this->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string',
            'excerpt' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'required|image',
        ]);

        // Save the main image if provided
        $thumb = null;
        if ($this->image) {
            $thumb = getImageName($this->image->getClientOriginalName());
            $this->image->storeAs('programs', $thumb);
        }

        // Save the program data
        $program = Program::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'image' => $thumb,
            'excerpt' => $this->excerpt,
            'description' => $this->description,
        ]);

        // Save gallery images if provided
        if ($this->gallery) {
            foreach ($this->gallery as $item) {
                $img = getImageName($item->getClientOriginalName());
                $item->storeAs('gallery', $img);
                Gallery::create([
                    'name' => $img,
                    'program_id' => $program->id,
                ]);
            }
        }

        // Dispatch success message
        $this->dispatch('success', 'Program created successfully');

        // Reset form fields
        $this->reset();
        $this->modalClose();
    }

    // Edit a specific program
    public function editProgram($id)
    {
        $this->currentProgram = Program::find($id);

        // Load the program's data into the component's properties
        $this->name = $this->currentProgram->name;
        $this->title = $this->currentProgram->title;
        $this->subtitle = $this->currentProgram->subtitle;
        $this->excerpt = $this->currentProgram->excerpt;
        $this->description = $this->currentProgram->description;
        $this->previewImage = $this->currentProgram->image;

        // Fetch existing gallery images
        $this->media = Gallery::where('program_id', $id)->get()->toArray();

        $this->openModal();
    }

    // Update a specific program
    public function update()
    {
        // Validate the input fields
        $this->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string',
            'excerpt' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
        ]);

        // Update the main image if provided
        $thumb = $this->previewImage;
        if ($this->image) {
            Storage::delete('programs/' . $thumb);
            $thumb = getImageName($this->image);
            $this->image->storeAs('programs', $thumb);
        }

        // Update the program data
        $this->currentProgram->update([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'image' => $thumb,
            'excerpt' => $this->excerpt,
            'description' => $this->description,
        ]);

        // Handle gallery images update
        if ($this->gallery) {
            // Delete old gallery images
            $galleryImages = Gallery::where('program_id', $this->currentProgram->id)->get();
            foreach ($galleryImages as $image) {
                Storage::delete('gallery/' . $image->name);
                $image->delete();
            }

            // Save new gallery images
            foreach ($this->gallery as $item) {
                $media = getImageName($item->getClientOriginalName());
                $item->storeAs('gallery', $media);
                Gallery::create([
                    'name' => $media,
                    'program_id' => $this->currentProgram->id,
                ]);
            }
        }

        // Dispatch success message
        $this->dispatch('success', 'Program updated successfully');

        // Reset form fields
        $this->reset();
        $this->modalClose();
    }

    // Submit handler for create or update
    public function submit()
    {
        if ($this->isEdit) {
            $this->update();
        } else {
            $this->save();
        }
    }

    // Open the modal
    public function openModal()
    {
        $this->dispatch('open-modal');
    }

    // Close the modal
    public function modalClose()
    {
        $this->reset();
        $this->dispatch('close-modal');
    }

    // Confirm delete program
    public function deleteProgram($id)
    {
        $this->dispatch('alert:confirm', [
            'type' => 'warning',
            'message' => __('Do you want to delete this program?'),
            'position' => 'center',
            'confirmButtonText' => 'Yes, delete it!',
            'denyButtonText' => "Don't save",
            'showDenylButton' => false,
            'showCancelButton' => true,
            'program' => $id,
        ]);
    }

    // Define listeners
    protected $listeners = ['deleteConfirmed'];

    // Handle confirmed delete
    public function deleteConfirmed($id)
    {
        $program = Program::findOrFail($id);

        if ($program) {
            $program->delete();
            $this->dispatch('success', 'Program deleted successfully!');
        }
    }

    // public function save()
    // {
    //     // Validate the input
    //     $this->validate([
    //         'name' => 'required|string|max: 255',
    //         'title' => 'nullable|string|max: 255',
    //         'subtitle' => 'nullable|string',
    //         'excerpt' => 'required|string',
    //         'description' => 'nullable|string',
    //         'image' => 'required',
    //     ]);

    //     // image save
    //     $thumb = null;
    //     if ($this->image) {
    //         $thumb = getImageName($this->image->getClientOriginalName());
    //         $this->image->storeAs('programs', $thumb);
    //     }

    //     // Save the Program
    //     $program = Program::create([
    //         'name' => $this->name,
    //         'slug' => Str::slug($this->name),
    //         'title' => $this->title,
    //         'subtitle' => $this->subtitle,
    //         'image' => $thumb,
    //         'excerpt' => $this->excerpt,
    //         'description' => $this->description,
    //     ]);

    //     // Gallery
    //     if ($this->gallery) {
    //         foreach ($this->gallery as $key => $item) {
    //             $img = getImageName($item->getClientOriginalName());
    //             $item->storeAs('gallery', $img);
    //             Gallery::create([
    //                 'name' => $img,
    //                 'program_id' => $program->id,
    //             ]);
    //         }
    //     }

    //     // Message
    //     $this->dispatch('success', 'Programs created successfully');

    //     // Reset form fields
    //     $this->reset();
    //     // dispatch('close-modal');
    //     $this->modalClose();
    // }

    // // Edit Slider
    // public function editProgram($id)
    // {

    //     $this->currentProgram = Program::find($id);

    //     $this->name = $this->currentProgram->name;
    //     $this->title = $this->currentProgram->title;
    //     $this->subtitle = $this->currentProgram->subtitle;
    //     $this->excerpt = $this->currentProgram->excerpt;
    //     $this->description = $this->currentProgram->description;
    //     $this->previewImage = $this->currentProgram->image;

    //     // Fetch existing images
    //     $this->media = Gallery::where('program_id', $id)->get()->toArray();

    //     // dispatch('open-modal');
    //     $this->openModal();
    // }

    // public function update()
    // {
    //     // Validate the input
    //     $this->validate([
    //         'name' => 'required|string|max: 255',
    //         'title' => 'nullable|string|max: 255',
    //         'subtitle' => 'nullable|string',
    //         'excerpt' => 'required|string',
    //         'description' => 'nullable|string',
    //         'image' => 'nullable|image',
    //     ]);

    //     // If image
    //     $thumb = $this->previewImage;
    //     if ($this->image) {
    //         Storage::delete('programs/' . $thumb);
    //         $thumb = getImageName($this->image);
    //         $this->image->storeAs('programs', $thumb);
    //     }

    //     // Save the slider (example code)
    //     $this->currentProgram->update([
    //         'name' => $this->name,
    //         'slug' => Str::slug($this->name),
    //         'title' => $this->title,
    //         'subtitle' => $this->subtitle,
    //         'image' => $thumb,
    //         'excerpt' => $this->excerpt,
    //         'description' => $this->description,
    //     ]);

    //     if ($this->gallery) {

    //         $galleryImages = Gallery::where('program_id', $this->currentProgram->id)->get();
    //         foreach ($galleryImages as $image) {
    //             Storage::delete('gallery' . $image->name);
    //             $image->delete();
    //         }

    //         $media = [];
    //         foreach ($this->gallery as $item) {
    //             $media = getImageName($item->getClientOriginalName());
    //             $item->storeAs('gallery', $media);
    //             Gallery::create([
    //                 'name' => $media,
    //                 'program_id' => $this->currentProgram->id,
    //             ]);
    //         }
    //     }

    //     // Message
    //     $this->dispatch('success', 'Programs updated successfully');

    //     $this->reset();

    //     $this->modalClose();

    // }

    // public function submit()
    // {
    //     if ($this->isEdit) {
    //         $this->update();
    //     } else {
    //         $this->save();
    //     }
    // }

    // // modal open model
    // public function openModal()
    // {
    //     $this->dispatch('open-modal');
    // }

    // // close modal
    // public function modalClose()
    // {
    //     $this->reset();
    //     $this->dispatch('close-modal');
    // }

    // // Program delete
    // public function deleteProgram($id)
    // {

    //     $this->dispatch('alert:confirm',
    //         type: 'warning',
    //         message: __('Do you want to delete this product?'),
    //         position: 'center',
    //         confirmButtonText: 'Yes, delete it!',
    //         denyButtonText: "Don't save",
    //         showDenylButton: false,
    //         showCancelButton: true,
    //         program: $id
    //     );
    // }

    // // Define Listener
    // protected $listeners = ['deleteConfirmed'];

    // // Confirmation Deleted
    // public function deleteConfirmed($id)
    // {
    //     $program = Program::findOrFail($id);

    //     if ($program) {
    //         $program->delete();
    //         $this->dispatch('success', 'Program deleted successfully!');
    //     }
    // }

    public function render()
    {
        return view('livewire.pages.program-index', [
            'programs' => Program::latest()->paginate(10),
        ]);
    }
}
