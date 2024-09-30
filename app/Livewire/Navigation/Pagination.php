<?php

namespace App\Livewire\Navigation;

use Livewire\Component;

class Pagination extends Component
{
    public $pages;

    public $activePage;

    public function render()
    {
        return view('livewire.navigation.pagination');
    }
}
