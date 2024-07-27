<?php

namespace App\Livewire\Pages;

use App\Models\Faq;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class FaqIndex extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $name, $title, $content, $status, $image;
    public $currentFaq;

    public $previewImage;
    public $isEdit = false;



    public function save()
    {
        // Validate the input fields
        $this->validate([
            'name'    => 'required|string|max:255',
            'title'   => 'required|string|max:255',
            'content' => 'nullable|string',
            'status'  => 'nullable',
            'image'   => 'required|image',
        ]);

        // Save the main image if provided
        $thumb = null;
        if ($this->image) {
            $thumb = getImageName($this->image->getClientOriginalName());
            $this->image->storeAs('faqs', $thumb);
        }

        // Save the faq data
        Faq::create([
            'title'   => $this->title,
            'name'    => $this->name,
            'content' => $this->content,
            'image'   => $thumb,
            'status'  => $this->status ? 'active': 'inactive',
        ]);



        // Dispatch success message
        $this->dispatch('success', 'Faq created successfully');

        // Reset form fields
        $this->reset();
        $this->modalClose();
    }

    // Edit a specific faq
    public function editFaq($id)
    {
        $this->currentFaq = Faq::find($id);

        // Load the faq's data into the component
        $this->name         = $this->currentFaq->name;
        $this->title        = $this->currentFaq->title;
        $this->content      = $this->currentFaq->content;
        $this->status       = $this->currentFaq->status == 'active' ? true: false;
        $this->previewImage = $this->currentFaq->image;

        // Dispatch modal
        $this->openModal();
    }

    // Update a specific faq
    public function update()
    {
        // Validate the input fields
        $this->validate([
            'name'    => 'required|string|max:255',
            'title'   => 'required|string|max:255',
            'content' => 'nullable|string',
            'status'  => 'nullable',
            'image'   => 'nullable',
        ]);

        // Update the main image if provided
        $thumb = $this->previewImage;
        if ($this->image) {
            Storage::delete('faqs/' . $thumb);
            $thumb = getImageName($this->image->getClientOriginalName());
            $this->image->storeAs('faqs', $thumb);
        }

        // Update the faq data
        $this->currentFaq->update([
            'title'   => $this->title,
            'name'    => $this->name,
            'content' => $this->content,
            'image'   => $thumb,
            'status'  => $this->status ? 'active': 'inactive',
        ]);


        // Dispatch success message
        $this->dispatch('success', 'Faq updated successfully');

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

    // Confirm delete faq
    function deleteFaq($id) {
        $this->dispatch('alert:confirm',
            type: 'warning',
            message: 'Do you want to delete this faq?',
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
        // find faq
        $faq = Faq::findOrFail($id);

        // delete faq
        if ($faq) {
            $faq->delete();
            $this->dispatch('success',  'Faq deleted successfully');
        }
    }

    public function render()
    {
        return view('livewire.pages.faq-index', [
            'faqs' => Faq::latest()->paginate(10),
        ]);
    }
}
