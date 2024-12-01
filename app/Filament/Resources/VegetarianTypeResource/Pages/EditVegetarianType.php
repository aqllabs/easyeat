<?php

namespace App\Filament\Resources\VegetarianTypeResource\Pages;

use App\Filament\Resources\VegetarianTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVegetarianType extends EditRecord
{
    protected static string $resource = VegetarianTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
