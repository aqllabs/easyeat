<?php

namespace App\Livewire\Navigation;

use Livewire\Component;

class StepsHorizontal extends Component
{
    public $steps;

    public function render()
    {
        return view('livewire.navigation.steps-horizontal');
    }
}
