<?php

namespace App\Filament\Resources\StripeOrderResource\Pages;

use App\Filament\Resources\StripeOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStripeOrder extends EditRecord
{
    protected static string $resource = StripeOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
