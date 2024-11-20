<?php

namespace App\Filament\Resources\VenueTypeResource\Pages;

use App\Filament\Resources\VenueTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVenueType extends EditRecord
{
    protected static string $resource = VenueTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
