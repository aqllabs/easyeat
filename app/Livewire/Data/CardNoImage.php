<?php

namespace App\Livewire\Data;

use Livewire\Component;

class CardNoImage extends Component
{
    public $title;

    public $description;

    public $buttonText;

    public $buttonClass;

    public function render()
    {
        return view('livewire.data.card-no-image');
    }
}
