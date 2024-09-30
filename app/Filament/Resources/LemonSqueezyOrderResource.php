<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LemonSqueezyOrderResource\Pages;
use App\Filament\Resources\LemonSqueezyOrderResource\Widgets\OrdersStats;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

//
class LemonSqueezyOrderResource extends Resource
{
    protected static ?string $model = \LemonSqueezy\Laravel\Order::class;

    protected static ?string $modelLabel = 'LemonSqueezy Orders';

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    protected static ?string $navigationGroup = 'Payments';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('lemon_squeezy_id')
                    ->label('LemonSqueezy ID')
                    ->searchable(),
                Tables\Columns\TextColumn::make('billable.name')
                    ->label('User Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('billable.email')
                    ->label('User Email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('order_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->sortable()
                    ->badge(),
                // Change the currency to match your store currency
                Tables\Columns\TextColumn::make('total')
                    ->money(config('services.cashier.currency'), divideBy: 100)
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('ordered_at')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    //Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])->defaultSort('ordered_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            OrdersStats::class,
        ];
    }
}
