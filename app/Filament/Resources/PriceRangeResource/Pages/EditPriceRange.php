<?php

namespace App\Filament\Resources\PriceRangeResource\Pages;

use App\Filament\Resources\PriceRangeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPriceRange extends EditRecord
{
    protected static string $resource = PriceRangeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
