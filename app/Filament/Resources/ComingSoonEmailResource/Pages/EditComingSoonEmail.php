<?php

namespace App\Filament\Resources\ComingSoonEmailResource\Pages;

use App\Filament\Resources\ComingSoonEmailResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditComingSoonEmail extends EditRecord
{
    protected static string $resource = ComingSoonEmailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
