<?php

namespace App\Http\Controllers\Payments;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use LemonSqueezy\Laravel\Checkout;
use Symfony\Component\HttpFoundation\Response;

class LemonSqueezyController extends Controller
{
    public function subscriptionCheckout(Request $request, $product, $variant): RedirectResponse|Checkout
    {
        $user = $request->user();

        if ($user->subscription()?->hasVariant($variant)) {
            return redirect()->back()->dangerBanner(__('You are already subscribed to that plan'));
        }

        if ($user->subscribed() && $user->subscription()?->valid()) {
            $user->subscription()
                ?->load('owner')
                ->endTrial()
                ->swap($product, $variant);

            // Replace back() with the route where user should be redirected after successful subscription
            return redirect()->back()->banner(__('You have successfully subscribed :plan to plan', ['plan' => $variant]));
        }

        return $user->subscribe($variant);
    }

    public function productCheckout(Request $request, $variantId): Checkout
    {
        return $request->user()->checkout($variantId)
            ->redirectTo(url('/'));
    }

    public function billing(Request $request): Response
    {
        $url = $request->user()->customerPortalUrl();

        return redirect()->to($url);
    }
}
