<?php

namespace App\Livewire\Feedback;

use Livewire\Component;

class AlertWarning extends Component
{
    public $text;

    public function render()
    {
        return view('livewire.feedback.alert-warning');
    }
}
