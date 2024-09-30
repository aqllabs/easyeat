<?php

namespace App\Filament\Resources\StripeOrderResource\Pages;

use App\Filament\Resources\StripeOrderResource;
use Filament\Resources\Pages\CreateRecord;

class CreateStripeOrder extends CreateRecord
{
    protected static string $resource = StripeOrderResource::class;
}
