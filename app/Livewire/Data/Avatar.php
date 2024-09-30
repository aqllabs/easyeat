<?php

namespace App\Livewire\Data;

use Livewire\Component;

class Avatar extends Component
{
    public $src;

    public $alt;

    public function render()
    {
        return view('livewire.data.avatar');
    }
}
