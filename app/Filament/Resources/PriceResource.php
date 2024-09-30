<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PriceResource\Pages;
use App\Models\Price;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PriceResource extends Resource
{
    protected static ?string $model = Price::class;

    protected static ?string $navigationLabel = 'Stripe Prices';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Payments';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('stripe_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('product_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('active')
                    ->required(),
                Forms\Components\TextInput::make('currency')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('type')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('billing_scheme')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tiers_mode')
                    ->maxLength(255),
                Forms\Components\TextInput::make('metadata'),
                Forms\Components\TextInput::make('interval')
                    ->maxLength(255),
                Forms\Components\TextInput::make('interval_count')
                    ->numeric(),
                Forms\Components\TextInput::make('trial_period_days')
                    ->numeric(),
                Forms\Components\TextInput::make('usage_type')
                    ->maxLength(255),
                Forms\Components\TextInput::make('unit_amount')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('stripe_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('product_id')
                    ->searchable(),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('currency')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('billing_scheme')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tiers_mode')
                    ->searchable(),
                Tables\Columns\TextColumn::make('interval')
                    ->searchable(),
                Tables\Columns\TextColumn::make('interval_count')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('trial_period_days')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('usage_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('unit_amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListPrices::route('/'),
            'create' => Pages\CreatePrice::route('/create'),
            'edit' => Pages\EditPrice::route('/{record}/edit'),
        ];
    }
}
