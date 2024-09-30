<?php

namespace App\Filament\Resources\LemonSqueezyOrderResource\Pages;

use App\Filament\Resources\LemonSqueezyOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrder extends EditRecord
{
    protected static string $resource = LemonSqueezyOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
