<?php

namespace App\Filament\Resources\CuisineResource\Pages;

use App\Filament\Resources\CuisineResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCuisines extends ListRecords
{
    protected static string $resource = CuisineResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
