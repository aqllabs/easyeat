<?php

namespace App\Services;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class LemonSqueezyService
{
    public function __construct(public PendingRequest $client, public ?string $store = null)
    {

    }

    public function setKey($key): static
    {
        $this->client = Http::baseUrl(config('services.lemonsqueezy.base_url'))
            ->timeout(3600)
            ->withToken($key);

        return $this;
    }

    public function setStore($store): static
    {
        $this->store = $store;

        return $this;
    }

    public function stores()
    {
        return $this->client->get('stores')->json();
    }

    public function store($id)
    {
        return $this->client->get('stores/'.$id)->json();
    }

    public function products()
    {
        return $this->client->get('products?filter[store_id]='.$this->store)->json();
    }

    public function product($productId)
    {
        return $this->client->get('products/'.$productId)->json();
    }

    public function variants($productId)
    {
        return $this->client->get('variants?filter[product_id]='.$productId)->json();
    }

    public function variant($variantId)
    {
        return $this->client->get('variants/'.$variantId)->json();
    }

    public function checkout($variant)
    {
        return $this->client->post('checkouts', [
            'data' => [
                'type' => 'checkouts',
                'attributes' => [
                    'product_options' => array_filter([
                        'enabled_variants' => [(string) $variant],
                    ]),
                    'expires_at' => null,
                ],
                'relationships' => [
                    'store' => [
                        'data' => [
                            'type' => 'stores',
                            'id' => $this->store,
                        ],
                    ],
                    'variant' => [
                        'data' => [
                            'type' => 'variants',
                            'id' => (string) $variant,
                        ],
                    ],
                ],
            ],
        ])->json();
    }
}
