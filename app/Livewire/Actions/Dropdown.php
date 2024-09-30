<?php

namespace App\Livewire\Actions;

use Livewire\Component;

class Dropdown extends Component
{
    public $title;

    public $items;

    public function render()
    {
        return view('livewire.actions.dropdown');
    }
}
