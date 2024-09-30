<?php

namespace App\Filament\Resources\LemonSqueezySubscriptionResource\Pages;

use App\Filament\Resources\LemonSqueezySubscriptionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLemonSqueezySubscription extends EditRecord
{
    protected static string $resource = LemonSqueezySubscriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
