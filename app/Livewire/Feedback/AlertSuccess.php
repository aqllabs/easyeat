<?php

namespace App\Livewire\Feedback;

use Livewire\Component;

class AlertSuccess extends Component
{
    public $text;

    public function render()
    {
        return view('livewire.feedback.alert-success');
    }
}
