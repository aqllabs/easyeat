<?php

namespace App\Livewire;

use App\Models\ComingSoonEmail;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class ComingSoon extends Component
{
    //  use InteractsWithBanner; // Use this trait for normal banner alerts
    use LivewireAlert; // Use this trait for SweetAlerts

    public $email;

    public function save()
    {
        $this->validate([
            'email' => 'required|email|unique:coming_soon_emails,email',
        ]);

        ComingSoonEmail::create([
            'email' => $this->email,
        ]);

        // Use this trait for normal banner alerts
        // $this->banner('Thanks for subscription! We will keep you updated.');

        $this->reset();

        // Use this for SweetAlerts
        $this->alert('success', __('Thanks for subscription! We will keep you updated.'), [
            'toast' => false,
            'position' => 'center',
        ]);
    }

    public function render()
    {
        return view('livewire.coming-soon');
    }
}
