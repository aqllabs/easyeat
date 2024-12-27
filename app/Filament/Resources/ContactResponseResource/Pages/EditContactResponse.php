<?php

namespace App\Filament\Resources\ContactResponseResource\Pages;

use App\Filament\Resources\ContactResponseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContactResponse extends EditRecord
{
    protected static string $resource = ContactResponseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
