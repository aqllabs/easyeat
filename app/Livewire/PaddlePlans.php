<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PaddlePlans extends Component
{
    public function render()
    {
        // lang/en/prices.php
        $prices = __('prices.paddle');

        $plans = collect($this->prices)->map(function ($plan) {
            if ($plan['priceId']) {
                // If your checkout requires auth user
                // Replace this with Auth::user()->checkout($plan['priceId'])->returnTo(route('dashboard'))
                $plan['checkout'] = \Laravel\Paddle\Checkout::guest([$plan['priceId']])
                    ->returnTo(route('dashboard'));
            }

            return $plan;
        });

        return view('livewire.paddle-plans')->with([
            'plans' => $plans,
            'prices' => $prices,
        ]);
    }
}
