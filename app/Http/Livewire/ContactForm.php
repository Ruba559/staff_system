<?php

namespace App\Http\Livewire;

use App\Models\ContactU;
use Livewire\Component;

class ContactForm extends Component
{

    public $name ;
    public $email;
    public $message;

    public function save()
    {
        $data = $this->validate([
            'name' => 'required|min:6',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        
        ContactU::create($data);

        $this->reset();

        session()->flash('message', 'Send success');

    }
    public function render()
    {
        return view('livewire.contact-form');
    }
}
