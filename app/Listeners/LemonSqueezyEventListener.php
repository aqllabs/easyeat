<?php

namespace App\Listeners;

use LemonSqueezy\Laravel\Events\WebhookHandled;

class LemonSqueezyEventListener
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
    public function handle(WebhookHandled $event): void
    {
        if ($event->payload['meta']['event_name'] === 'subscription_created') {
            $eventName = $event->payload['meta']['event_name'];
        }

        if ($event->payload['meta']['event_name'] === 'subscription_updated') {
            $eventName = $event->payload['meta']['event_name'];
        }

        if ($event->payload['meta']['event_name'] === 'order_created') {
            $eventName = $event->payload['meta']['event_name'];
        }

        if ($event->payload['meta']['event_name'] === 'order_refunded') {
            $eventName = $event->payload['meta']['event_name'];
        }

        // Available events

        //order_created
        //order_refunded
        //subscription_created
        //subscription_updated
        //subscription_cancelled
        //subscription_resumed
        //subscription_expired
        //subscription_paused
        //subscription_unpaused
        //subscription_payment_failed
        //subscription_payment_success
        //subscription_payment_recovered
        //subscription_payment_refunded
        //subscription_plan_changed
        //license_key_created
        //license_key_updated
    }
}
