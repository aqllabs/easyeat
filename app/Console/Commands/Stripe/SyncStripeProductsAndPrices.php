<?php

namespace App\Console\Commands\Stripe;

use Illuminate\Console\Command;
use Laravel\Cashier\Cashier;

class SyncStripeProductsAndPrices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stripe:sync-products-and-prices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $stripe = Cashier::stripe();

        // Get all products from Stripe
        $products = $stripe->products->all();

        foreach ($products as $product) {
            // Create or update the Product
            $productModel = \App\Models\Product::updateOrCreate(
                ['stripe_id' => $product->id],
                [
                    'name' => $product->name,
                    'description' => $product->description,
                    'active' => $product->active,
                    'type' => $product->type,
                    'default_price' => $product->default_price,
                    'metadata' => json_encode($product->metadata),
                ]
            );

            $this->info('Product created/updated: '.$product->id);

            // Get all prices for the product
            $prices = $stripe->prices->all(['product' => $product->id]);

            foreach ($prices as $price) {
                $priceAttributes = [
                    'product_id' => $price->product,
                    'active' => $price->active,
                    'currency' => $price->currency,
                    'type' => $price->type,
                    'billing_scheme' => $price->billing_scheme,
                    'tiers_mode' => $price->tiers_mode ?? null,
                    'metadata' => json_encode($price->metadata),
                ];

                // Handle recurring data
                if (isset($price->recurring)) {
                    $priceAttributes['interval'] = $price->recurring['interval'];
                    $priceAttributes['interval_count'] = $price->recurring['interval_count'];
                    $priceAttributes['trial_period_days'] = $price->recurring['trial_period_days'];
                    $priceAttributes['usage_type'] = $price->recurring['usage_type'];
                }

                // Handle unit amount or tiers based on billing scheme
                if ($price->billing_scheme === 'per_unit') {
                    $priceAttributes['unit_amount'] = $price->unit_amount;
                }

                // Create or update the Price
                $priceModel = \App\Models\Price::updateOrCreate(
                    ['stripe_id' => $price->id],
                    $priceAttributes
                );

                $this->info('Price created/updated: '.$priceModel->stripe_id);
            }
        }

        $this->info('Synced all products and prices');
    }
}
