<?php

namespace App\Livewire;

use App\Models\ComingSoonEmail;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Footer extends Component
{
    use LivewireAlert;

    public $email;

    public function save()
    {
        $this->validate([
            'email' => 'required|email|unique:coming_soon_emails,email',
        ]);

        ComingSoonEmail::create([
            'email' => $this->email,
        ]);

        $this->reset();

        $this->alert('success', __('Thanks for reaching out! We will get back to you soon.'), [
            'toast' => false,
            'position' => 'center',
        ]);
    }

    public function render()
    {
        return view('livewire.footer');
    }
}
