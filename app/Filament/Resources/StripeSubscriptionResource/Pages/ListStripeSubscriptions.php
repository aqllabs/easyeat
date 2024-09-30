<?php

namespace App\Filament\Resources\StripeSubscriptionResource\Pages;

use App\Filament\Resources\StripeSubscriptionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStripeSubscriptions extends ListRecords
{
    protected static string $resource = StripeSubscriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //            Actions\CreateAction::make(),
        ];
    }
}
