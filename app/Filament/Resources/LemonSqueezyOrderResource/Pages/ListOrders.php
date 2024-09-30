<?php

namespace App\Filament\Resources\LemonSqueezyOrderResource\Pages;

use App\Filament\Resources\LemonSqueezyOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Pages\Concerns\ExposesTableToWidgets;

class ListOrders extends ListRecords
{
    use ExposesTableToWidgets;

    protected static string $resource = LemonSqueezyOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            LemonSqueezyOrderResource\Widgets\OrdersStats::class,
        ];
    }
}
