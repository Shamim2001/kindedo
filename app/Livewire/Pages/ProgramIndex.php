<?php

namespace App\Livewire\Pages;

use App\Models\Program;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ProgramIndex extends Component
{
    use WithFileUploads;

    public $name, $title, $subtitle, $excerpt, $description, $image;
    public $currentProgram;

    public $previewImage;
    public $isEdit= false;


    public function save()
    {
        // Validate the input
        $this->validate([
            'name'        => 'required|string|max: 255',
            'title'       => 'nullable|string|max: 255',
            'subtitle'    => 'nullable|string',
            'excerpt'     => 'required|string',
            'description' => 'nullable|string',
            'image'       => 'required',
        ]);

        // image save
        if($this->image) {
            $filename = getImageName($this->image->getClientOriginalName());
            $this->image->storeAs('programs', $filename);
        }

        // Save the Program
        Program::create([
            'name'        => $this->name,
            'slug'        => Str::slug($this->name),
            'title'       => $this->title,
            'subtitle'    => $this->subtitle,
            'image'       => $filename,
            'excerpt'     => $this->excerpt,
            'description' => $this->description,
        ]);

        // Message
        $this->dispatch('success',  'Programs created successfully');

        // Reset form fields
        $this->reset();
        // dispatch('close-modal');
        $this->modalClose();
    }



    // Edit Slider
    function editProgram($id) {

        $this->currentProgram = Program::find($id);

        $this->name        = $this->currentProgram->name;
        $this->title        = $this->currentProgram->title;
        $this->subtitle     = $this->currentProgram->subtitle;
        $this->excerpt      = $this->currentProgram->excerpt;
        $this->description  = $this->currentProgram->description;
        $this->previewImage = $this->currentProgram->image;

        // dispatch('open-modal');
        $this->openModal();
    }


    public function update()
    {
        // Validate the input
        $this->validate([
            'name'        => 'required|string|max: 255',
            'title'       => 'nullable|string|max: 255',
            'subtitle'    => 'nullable|string',
            'excerpt'     => 'required|string',
            'description' => 'nullable|string',
            'image'       => 'nullable|image',
        ]);

        // If image
        if($this->image) {
            Storage::delete('programs/'. $this->previewImage);
            $filename = getImageName($this->image->getClientOriginalName());
            $this->image->storeAs('programs', $filename);
        }

        // Save the slider (example code)
        $this->currentProgram->update([
            'name'        => $this->name,
            'slug'        => Str::slug($this->name),
            'title'       => $this->title,
            'subtitle'    => $this->subtitle,
            'image'       => $filename,
            'excerpt'     => $this->excerpt,
            'description' => $this->description,
        ]);

        // Message
        $this->dispatch('success',  'Programs created successfully');

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
    function openModal() {
        $this->dispatch('open-modal');
    }

    // close modal
    function modalClose() {
        $this->dispatch('close-modal');
    }


    // Program delete
    function deleteProgram($id) {

        $this->dispatch('alert:confirm',
            type: 'warning',
            message: __('Do you want to delete this product?'),
            position: 'center',
            confirmButtonText: 'Yes, delete it!',
            denyButtonText: "Don't save",
            showDenylButton: false,
            showCancelButton: true,
            program: $id
        );
    }

    // Define Listener
    protected $listeners = ['deleteConfirmed'];

    // Confirmation Deleted
    public function deleteConfirmed($id)
    {
        $program = Program::findOrFail($id);

        if ($program) {
            $program->delete();
            $this->dispatch('success',  'Program deleted successfully!');
        }
    }



    public function render()
    {
        return view('livewire.pages.program-index', [
            'programs' => Program::latest()->paginate(10),
        ]);
    }
}
