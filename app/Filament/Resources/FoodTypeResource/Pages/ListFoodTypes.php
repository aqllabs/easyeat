<?php

namespace App\Filament\Resources\FoodTypeResource\Pages;

use App\Filament\Resources\FoodTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFoodTypes extends ListRecords
{
    protected static string $resource = FoodTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
