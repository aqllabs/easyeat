<?php

namespace App\Filament\Resources\ComingSoonEmailResource\Pages;

use App\Filament\Resources\ComingSoonEmailResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListComingSoonEmails extends ListRecords
{
    protected static string $resource = ComingSoonEmailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
