<?php

namespace App\Livewire\Feedback;

use Livewire\Component;

class Alert extends Component
{
    public $text;

    public function render()
    {
        return view('livewire.feedback.alert');
    }
}
