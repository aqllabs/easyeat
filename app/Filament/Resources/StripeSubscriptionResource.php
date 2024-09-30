<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StripeSubscriptionResource\Pages;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class StripeSubscriptionResource extends Resource
{
    protected static ?string $model = \Laravel\Cashier\Subscription::class;

    protected static ?string $modelLabel = 'Stripe Subscriptions';

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    protected static ?string $navigationGroup = 'Payments';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('stripe_id')
                    ->label('Stripe ID')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('stripe_status')
                    ->label('Status')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('stripe_price')
                    ->label('Price')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('quantity')
                    ->numeric()
                    ->required(),
                Forms\Components\DateTimePicker::make('trial_ends_at'),
                Forms\Components\DateTimePicker::make('ends_at'),
                Forms\Components\DateTimePicker::make('created_at')
                    ->disabled()
                    ->dehydrated(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('stripe_id')
                    ->label('Stripe ID')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.email')
                    ->label('Email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('stripe_status')
                    ->label('Status')
                    ->searchable()
                    ->badge(),
                Tables\Columns\TextColumn::make('stripe_price')
                    ->label('Price')
                    ->searchable(),
                Tables\Columns\TextColumn::make('quantity'),
                Tables\Columns\TextColumn::make('trial_ends_at')->dateTime(),
                Tables\Columns\TextColumn::make('ends_at')->dateTime(),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
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
            'index' => Pages\ListStripeSubscriptions::route('/'),
            'create' => Pages\CreateStripeSubscription::route('/create'),
            'view' => Pages\ViewStripeSubscription::route('/{record}'),
            'edit' => Pages\EditStripeSubscription::route('/{record}/edit'),
        ];
    }
}
