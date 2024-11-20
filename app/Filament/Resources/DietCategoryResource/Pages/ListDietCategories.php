<?php

namespace App\Filament\Resources\DietCategoryResource\Pages;

use App\Filament\Resources\DietCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDietCategories extends ListRecords
{
    protected static string $resource = DietCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
