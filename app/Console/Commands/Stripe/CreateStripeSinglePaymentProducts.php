<?php

namespace App\Console\Commands\Stripe;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use JsonException;
use Laravel\Cashier\Cashier;

class CreateStripeSinglePaymentProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stripe:create-single-payment-products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Stripe Additional Products and Prices';

    /**
     * Execute the console command.
     *
     * @throws JsonException
     * @throws \Stripe\Exception\ApiErrorException
     */
    public function handle(): int
    {
        $stripe = Cashier::stripe();

        $data = json_decode(file_get_contents(base_path('stubs/stripe/single_payment_products.json')), true, 512, JSON_THROW_ON_ERROR);

        foreach ($data['products'] as $item) {
            try {
                $product = $stripe->products->create($item);
                $this->info('Created Product: '.$product['name']);
            } catch (Exception $e) {
                $product = $stripe->products->update($item['id'], Arr::except($item, ['id']));
                $this->info('Updated Product: '.$product['name']);
            }

            try {
                $prices = $stripe->prices->all(['product' => $product['id']]);

                if (empty($prices['data'])) {
                    $prices = [];
                    foreach ($data['prices'] as $priceItem) {
                        $price = $stripe->prices->create($priceItem);
                        $prices[] = $price['id'];

                        $this->info('Created Price: '.$price['id']);

                    }
                    $this->info('Updating Product Default Price: '.$prices[0]);
                    $stripe->products->update($product['id'], ['default_price' => $prices[0]]);

                    return 0;
                }

                foreach ($prices['data'] as $price) {
                    $priceItem = collect($data['prices'])->firstWhere(fn ($item) => $item['metadata']['points'] === $price['metadata']['points']);
                    $price = $stripe->prices->update($price['id'], Arr::only(['metadata', 'nickname'], $priceItem));

                    $this->info('Updated Price: '.$price['id']);
                }
            } catch (Exception $e) {
                $this->error($e->getMessage());
            }
        }

        return 0;
    }
}
