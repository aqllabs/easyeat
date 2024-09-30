<?php

namespace App\Livewire;

use Livewire\Component;

class Plans extends Component
{
    // Use StripeClient or LemonSqueezyService to get prices dynamically
    // Example of dynamic usage for LemonSqueezy-> https://docs.larafast.com/components/plans

    public function render()
    {
        // lang/en/prices.php
        // Use __('prices.lemonsqueezy') for LemonSqueezy features
        $plans = __('prices.stripe');

        return view('livewire.plans', ['plans' => $plans]);
    }
}
