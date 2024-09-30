<?php

namespace App\Livewire;

use Livewire\Component;

class Article extends Component
{
    public $article;

    public function render()
    {
        return view('livewire.article');
    }
}
