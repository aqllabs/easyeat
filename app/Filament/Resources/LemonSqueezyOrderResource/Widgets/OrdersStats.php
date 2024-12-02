<?php

namespace App\Filament\Resources\LemonSqueezyOrderResource\Widgets;

use App\Filament\Resources\LemonSqueezyOrderResource\Pages\ListOrders;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OrdersStats extends BaseWidget
{
    protected ?string $heading = 'Chart';

    use InteractsWithPageTable;

    protected function getTablePage(): string
    {
        return ListOrders::class;
    }

    protected function getStats(): array
    {
        $orders = $this->getPageTableQuery()->get();

        $total = $orders->sum('total') / 100;
        $totalToday = $orders->where('created_at', '>', today()->startOfDay())->sum('total') / 100;
        $totalYesterday = $orders->whereBetween('created_at', [today()->subDay()->startOfDay(), today()->startOfDay()])->sum('total') / 100;
        $lastSevenDays = $orders->where('created_at', '>', now()->subDays(7)->startOfDay())->sum('total') / 100;
        $previousSevenDays = $orders->whereBetween('created_at', [now()->subDays(14)->startOfDay(), now()->subDays(7)->startOfDay()])->sum('total') / 100;
        // $lastMonth = $orders->where('created_at', '>', now()->subMonth()->startOfDay())->sum('total') / 100;
        // $previousMonth = $orders->whereBetween('created_at', [now()->subMonths(2)->startOfDay(), now()->subMonth()->startOfDay()])->sum('total') / 100;

        return [
            Stat::make('Total Orders', $orders->count())
                ->chart($orders
                    ->sortBy('created_at')
                    ->groupBy('created_at')
                    ->mapWithKeys(function ($result, $key) {
                        return [$key => $result->count()];
                    })
                    ->values()
                    ->toArray())
                ->color('primary'),

            Stat::make('Total Sales', '$' . number_format($total, 2))
                ->chart($orders
                    ->sortBy('created_at')
                    ->groupBy('created_at')
                    ->mapWithKeys(function ($result, $key) {
                        return [$key => $result->sum('total') / 100];
                    })
                    ->values()
                    ->toArray())
                ->color('success'),

            Stat::make('Sales Today', '$' . number_format($totalToday, 2))
                ->description('$' . number_format($totalToday - $totalYesterday, 2))
                ->descriptionIcon($totalToday >= $totalYesterday ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($totalToday >= $totalYesterday ? 'success' : 'danger'),

            Stat::make('Last 7 Days', '$' . number_format($lastSevenDays, 2))
                ->description('$' . number_format($lastSevenDays - $previousSevenDays, 2))
                ->descriptionIcon($lastSevenDays >= $previousSevenDays ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->chart($orders
                    ->where('created_at', '>', now()->subDays(7)->startOfDay())
                    ->sortBy('created_at')
                    ->groupBy('created_at')
                    ->mapWithKeys(function ($result, $key) {
                        return [$key => $result->sum('total') / 100];
                    })
                    ->values()
                    ->toArray())
                ->color($lastSevenDays >= $previousSevenDays ? 'success' : 'danger'),

            // Stat::make('Last 30 Days', '$'.number_format($lastMonth, 2))
            //     ->description('$'.number_format($lastMonth - $previousMonth, 2))
            //     ->descriptionIcon($lastMonth >= $previousMonth ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
            //     ->chart($orders
            //         ->where('created_at', '>', now()->subMonth()->startOfDay())
            //         ->sortBy('created_at')
            //         ->groupBy('created_at')
            //         ->mapWithKeys(function ($result, $key) {
            //             return [$key => $result->sum('total') / 100];
            //         })
            //         ->values()
            //         ->toArray())
            //     ->color($lastMonth >= $previousMonth ? 'success' : 'danger'),
        ];
    }
}
