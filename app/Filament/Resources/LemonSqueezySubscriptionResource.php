<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LemonSqueezySubscriptionResource\Pages;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class LemonSqueezySubscriptionResource extends Resource
{
    protected static ?string $model = \LemonSqueezy\Laravel\Subscription::class;

    protected static ?string $modelLabel = 'LemonSqueezy Subscriptions';

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

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
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge(),
                Tables\Columns\TextColumn::make('product_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('variant_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('card_brand')
                    ->searchable(),
                Tables\Columns\TextColumn::make('card_last_four')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pause_mode')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pause_resumes_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('trial_ends_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('renews_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('ends_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListLemonSqueezySubscriptions::route('/'),
            'create' => Pages\CreateLemonSqueezySubscription::route('/create'),
            'view' => Pages\ViewLemonSqueezySubscription::route('/{record}'),
            'edit' => Pages\EditLemonSqueezySubscription::route('/{record}/edit'),
        ];
    }
}
