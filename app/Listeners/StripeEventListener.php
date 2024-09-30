<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\SubscriptionCreatedNotification;
use Laravel\Cashier\Events\WebhookReceived;

class StripeEventListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(WebhookReceived $event): void
    {
        if ($event->payload['type'] === 'customer.subscription.created') {
            $stripeId = $event->payload['data']['object']['customer'];
            // $product = $event->payload['data']['object']['plan']['product'];

            $user = User::where('stripe_id', $stripeId)->firstOrFail();
            $user->notify(new SubscriptionCreatedNotification());

            // Write your logic here
        }

        if ($event->payload['type'] === 'checkout.session.completed') {
            $checkoutSession = $event->payload['data']['object'];
            $stripeId = $checkoutSession['customer'];
            $user = User::where('stripe_id', $stripeId)->firstOrFail();
            $user->notify(new SubscriptionCreatedNotification());

            // Check if the mode is 'payment'
            // As Stripe Subscription also sends "checkout.session.completed" webhook,
            // we need to check if this webhook is for "payment" to create a new StripeOrder

            if ($checkoutSession['mode'] === 'payment') {
                // Find the corresponding Price model
                $price = \App\Models\Price::where('stripe_id', $checkoutSession['metadata']['price'])->first();

                if ($price) {
                    // Create a new StripeOrder
                    \App\Models\StripeOrder::create([
                        'stripe_id' => $checkoutSession['id'],
                        'user_id' => $user->id,
                        'price_id' => $price->stripe_id,
                        'amount' => $checkoutSession['amount_total'],
                        'currency' => $checkoutSession['currency'],
                        'status' => $checkoutSession['status'],
                        'payment_status' => $checkoutSession['payment_status'],
                        'metadata' => json_encode($checkoutSession['metadata']),
                    ]);

                    // Log the order creation
                    \Illuminate\Support\Facades\Log::info('Stripe order created for user: '.$user->id);
                } else {
                    // Log an error if the price is not found
                    \Illuminate\Support\Facades\Log::error('Price not found for Stripe checkout session: '.$checkoutSession['id']);
                }
            }
        }

        if ($event->payload['type'] === 'product.created' || $event->payload['type'] === 'product.updated') {
            $productData = $event->payload['data']['object'];

            // Create or update the Product based on the received data
            $product = \App\Models\Product::updateOrCreate(
                ['stripe_id' => $productData['id']],
                [
                    'name' => $productData['name'],
                    'description' => $productData['description'],
                    'active' => $productData['active'],
                    'type' => $productData['type'],
                    'default_price' => $productData['default_price'],
                    'metadata' => json_encode($productData['metadata']),
                ]
            );

            // Log the product creation/update
            \Illuminate\Support\Facades\Log::info('Product created/updated: '.$product->name);
        }

        if ($event->payload['type'] === 'price.created' || $event->payload['type'] === 'price.updated') {
            $priceData = $event->payload['data']['object'];

            // Create or update the Price based on the received data
            // Prepare the price data
            $priceAttributes = [
                'product_id' => $priceData['product'],
                'active' => $priceData['active'],
                'currency' => $priceData['currency'],
                'type' => $priceData['type'],
                'billing_scheme' => $priceData['billing_scheme'],
                'tiers_mode' => $priceData['tiers_mode'] ?? null,
                'metadata' => json_encode($priceData['metadata']),
            ];

            // Handle recurring data
            if (isset($priceData['recurring'])) {
                $priceAttributes['interval'] = $priceData['recurring']['interval'];
                $priceAttributes['interval_count'] = $priceData['recurring']['interval_count'];
                $priceAttributes['trial_period_days'] = $priceData['recurring']['trial_period_days'];
                $priceAttributes['usage_type'] = $priceData['recurring']['usage_type'];
            }

            // Handle unit amount or tiers based on billing scheme
            if ($priceData['billing_scheme'] === 'per_unit') {
                $priceAttributes['unit_amount'] = $priceData['unit_amount'];
            }

            // Create or update the Price
            $price = \App\Models\Price::updateOrCreate(
                ['stripe_id' => $priceData['id']],
                $priceAttributes
            );

            // Log the price creation/update
            \Illuminate\Support\Facades\Log::info('Price created/updated: '.$price->stripe_id);
        }
    }
}
