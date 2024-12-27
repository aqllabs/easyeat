<?php

namespace App\Filament\Resources\ContactResponseResource\Pages;

use App\Filament\Resources\ContactResponseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListContactResponses extends ListRecords
{
    protected static string $resource = ContactResponseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
