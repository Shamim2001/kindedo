<?php

namespace App\Livewire\Pages;

use App\Models\Contact;
use App\Models\Setting;
use Livewire\Component;

class ContactPage extends Component
{
    public $name, $email, $phone, $comments;


    function messageSend() {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'comments' => 'required',
        ]);

        // create Contact us
        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'comments' => $this->comments,
        ]);

        // Dispatch success message
        $this->dispatch('success', 'Message send successfully');

        $this->reset();
    }


    public function render()
    {
        return view('livewire.pages.contact-page',[
            'contact' => Setting::first(),
        ]);
    }
}
