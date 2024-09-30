<?php

namespace App\Livewire;

use Livewire\Component;

class Faq extends Component
{
    public $selectedFaq = null;

    public function toggleFaq($key)
    {
        $this->selectedFaq = $key;
    }

    public function render()
    {
        // lang/en/faq.php

        $faqs = __('faq');

        return view('livewire.faq', [
            'faqs' => $faqs,
        ]);
    }
}
