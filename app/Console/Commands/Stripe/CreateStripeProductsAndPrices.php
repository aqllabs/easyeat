<?php

namespace App\Console\Commands\Stripe;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use JsonException;
use Laravel\Cashier\Cashier;
use Stripe\Exception\ApiErrorException;

class CreateStripeProductsAndPrices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stripe:create-products-and-prices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Stripe Products and Prices from Json File /stubs/stripe/prices.json';

    /**
     * Execute the console command.
     *
     * @throws JsonException
     * @throws ApiErrorException
     */
    public function handle(): int
    {
        $stripe = Cashier::stripe();

        $products = json_decode(file_get_contents(base_path('stubs/stripe/products.json')), true, 512, JSON_THROW_ON_ERROR);

        foreach ($products as $product) {
            try {
                $stripe->products->create($product);
                // You can save your created product in the database to show in plans section
                $this->info('Created Product: '.$product['name']);
            } catch (Exception $e) {
                $stripe->products->update($product['id'], Arr::except($product, ['id']));
                $this->info('Updated Product: '.$product['name']);
            }
        }

        $prices = json_decode(file_get_contents(base_path('stubs/stripe/prices.json')), true, 512, JSON_THROW_ON_ERROR);

        foreach ($prices as $price) {
            try {
                $stripe->plans->create($price);
                // You can save your created prices in the database to show in plans section
                $this->info('Created Price: '.$price['id']);
            } catch (Exception $e) {
                $stripe->plans->update($price['id'], Arr::only($price, ['metadata', 'nickname']));
                $this->info('Updated Price: '.$price['id']);
            }

            $this->info('Updating Product Default Price: '.$price['id']);
            $stripe->products->update($price['product'], ['default_price' => $price['id']]);
        }

        return 0;
    }
}
