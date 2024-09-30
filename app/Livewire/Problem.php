<?php

namespace App\Livewire;

use Livewire\Component;

class Problem extends Component
{
    public $steps = [];

    public $heading;

    public $text;

    public function render()
    {
        return view('livewire.problem');
    }
}
