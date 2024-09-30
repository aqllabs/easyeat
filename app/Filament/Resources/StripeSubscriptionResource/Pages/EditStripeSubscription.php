<?php

namespace App\Filament\Resources\StripeSubscriptionResource\Pages;

use App\Filament\Resources\StripeSubscriptionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStripeSubscription extends EditRecord
{
    protected static string $resource = StripeSubscriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
