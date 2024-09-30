<?php

namespace App\Filament\Resources\ComingSoonEmailResource\Pages;

use App\Filament\Resources\ComingSoonEmailResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewComingSoonEmail extends ViewRecord
{
    protected static string $resource = ComingSoonEmailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
