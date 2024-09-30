<?php

namespace App\Http\Controllers\Payments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;
use Symfony\Component\HttpFoundation\Response;

class StripeController extends Controller
{
    public function subscriptionCheckout(Request $request, $price)
    {
        $user = $request->user();

        if ($user->subscribedToPrice($price)) {
            return redirect()->back()->dangerBanner(__('You are already subscribed to that plan'));
        }

        if ($user->subscribed() && $user->subscription()?->valid()) {
            $user->subscription()
                ?->load('owner')
                ->skipTrial()
                ->swap($price);

            // Replace back() with the route where user should be redirected after successful subscription
            return redirect()->back()->banner(__('You have successfully subscribed to :price plan', ['price' => $price]));
        }

        $checkout = $user
            ->newSubscription('default', $price);

        // If user already used his trial with different plan, new trial will not be allowed for him
        if (! $user->trialIsUsed()) {
            $checkout = $checkout->trialDays((int) config('services.stripe.trial_period_days'));
        }

        // Allow promotion codes
        if (config('services.stripe.allow_promotion_codes')) {
            $checkout = $checkout->allowPromotionCodes();
        }

        return $checkout->checkout([
            'success_url' => route('stripe.success').'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('dashboard'),
        ]);
    }

    public function productCheckout(Request $request, $price)
    {
        return $request->user()->checkout($price, [
            'success_url' => route('stripe.success').'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('dashboard'),
            'metadata' => [
                'price' => $price,
            ],
            'allow_promotion_codes' => config('services.stripe.allow_promotion_codes'),
        ]);
    }

    public function success(Request $request)
    {
        $sessionId = $request->get('session_id');

        try {
            Cashier::stripe()->checkout->sessions->retrieve($sessionId);
        } catch (\Exception $exception) {
            return redirect()->route('dashboard')->dangerBanner('Something went wrong');
        }

        $request->user()->update(['trial_is_used' => true]);

        return redirect()->route('dashboard')->banner(__('You have successfully subscribed'));
    }

    public function error()
    {
        return redirect()->route('stripe.plans')->dangerBanner(__('Something Went Wrong'));
    }

    public function billing(Request $request): Response
    {
        $url = $request->user()->billingPortalUrl(route('dashboard'));

        return redirect()->to($url);
    }
}
