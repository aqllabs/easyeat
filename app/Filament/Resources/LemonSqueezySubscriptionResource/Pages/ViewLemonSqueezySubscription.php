<?php

namespace App\Filament\Resources\LemonSqueezySubscriptionResource\Pages;

use App\Filament\Resources\LemonSqueezySubscriptionResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewLemonSqueezySubscription extends ViewRecord
{
    protected static string $resource = LemonSqueezySubscriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
