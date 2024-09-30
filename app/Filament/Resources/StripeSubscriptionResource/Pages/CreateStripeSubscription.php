<?php

namespace App\Filament\Resources\StripeSubscriptionResource\Pages;

use App\Filament\Resources\StripeSubscriptionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateStripeSubscription extends CreateRecord
{
    protected static string $resource = StripeSubscriptionResource::class;
}
