<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Filament\Resources\UserResource\Pages\ListUsers;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UsersStats extends BaseWidget
{
    use InteractsWithPageTable;

    protected function getTablePage(): string
    {
        return ListUsers::class;
    }

    protected function getStats(): array
    {
        $users = $this->getPageTableQuery()->get();

        $registeredToday = $users->where('created_at', '>', today()->startOfDay())->count();
        $registeredYesterday = $users->whereBetween('created_at', [today()->subDay()->startOfDay(), today()->startOfDay()])->count();
        $lastSevenDays = $users->where('created_at', '>', now()->subDays(7)->startOfDay());
        $previousSevenDays = $users->whereBetween('created_at', [now()->subDays(14)->startOfDay(), now()->subDays(7)->startOfDay()])->count();
        $lastMonth = $users->where('created_at', '>', now()->subMonth()->startOfDay());
        $previousMonth = $users->whereBetween('created_at', [now()->subMonths(2)->startOfDay(), now()->subMonth()->startOfDay()])->count();

        return [
            Stat::make('Total Users', $users->count())
                ->chart($users
                    ->sortBy('created_at')
                    ->groupBy('created_at')
                    ->mapWithKeys(function ($result, $key) {
                        return [$key => $result->count()];
                    })
                    ->values()
                    ->toArray())
                ->color('success'),

            Stat::make('Registered Today', $registeredToday)
                ->description($registeredToday - $registeredYesterday)
                ->descriptionIcon($registeredToday >= $registeredYesterday ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($registeredToday >= $registeredYesterday ? 'success' : 'danger'),

            Stat::make('Last 7 Days', $lastSevenDays->count())
                ->description($lastSevenDays->count() - $previousSevenDays)
                ->descriptionIcon($lastSevenDays->count() >= $previousSevenDays ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->chart($lastSevenDays
                    ->sortBy('created_at')
                    ->groupBy('created_at')
                    ->mapWithKeys(function ($result, $key) {
                        return [$key => $result->count()];
                    })
                    ->values()
                    ->toArray())
                ->color($lastSevenDays->count() >= $previousSevenDays ? 'success' : 'danger'),

            Stat::make('Last 30 Days', $lastMonth->count())
                ->description($lastMonth->count() - $previousMonth)
                ->descriptionIcon($lastMonth->count() >= $previousMonth ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->chart($lastMonth
                    ->sortBy('created_at')
                    ->groupBy('created_at')
                    ->mapWithKeys(function ($result, $key) {
                        return [$key => $result->count()];
                    })
                    ->values()
                    ->toArray())
                ->color($lastMonth->count() >= $previousMonth ? 'success' : 'danger'),
        ];
    }
}
