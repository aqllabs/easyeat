<?php

namespace App\Filament\Resources\LemonSqueezySubscriptionResource\Pages;

use App\Filament\Resources\LemonSqueezySubscriptionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLemonSqueezySubscriptions extends ListRecords
{
    protected static string $resource = LemonSqueezySubscriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //            Actions\CreateAction::make(),
        ];
    }
}
