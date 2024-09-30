<?php

namespace App\Livewire\Actions;

use Livewire\Component;

class Modal extends Component
{
    public $buttonText;

    public $id;

    public $title;

    public $description;

    public function render()
    {
        return view('livewire.actions.modal');
    }
}
