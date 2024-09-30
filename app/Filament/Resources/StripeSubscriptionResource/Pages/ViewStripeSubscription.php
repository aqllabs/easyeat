<?php

namespace App\Filament\Resources\StripeSubscriptionResource\Pages;

use App\Filament\Resources\StripeSubscriptionResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewStripeSubscription extends ViewRecord
{
    protected static string $resource = StripeSubscriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
