<?php

namespace App\Livewire\Feedback;

use Livewire\Component;

class Progress extends Component
{
    public $value;

    public function render()
    {
        return view('livewire.feedback.progress');
    }
}
