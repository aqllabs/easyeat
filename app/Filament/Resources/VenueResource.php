<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VenueResource\Pages;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\DietCategory;
use App\Models\HalalAssurance;
use App\Models\PriceRange;
use App\Models\Cuisine;
use App\Models\Venue;
use App\Models\VenueType;

class VenueResource extends Resource
{
    protected static ?string $model = Venue::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('address')
                    ->required(),
                Forms\Components\TextInput::make('city')
                    ->required(),
                Forms\Components\TextInput::make('area')
                    ->required(),
                Forms\Components\TextInput::make('telephone')
                    ->tel(),
                Forms\Components\TextInput::make('website'),
                Forms\Components\TextInput::make('email')
                    ->email(),
                Forms\Components\TextInput::make('google_maps_url'),
                Forms\Components\Select::make('cuisines')->multiple()->relationship(name: 'cuisines', titleAttribute: 'display_name'),
                Forms\Components\Select::make('price_range_id')->relationship(name: 'priceRange', titleAttribute: 'display_name'),
                Forms\Components\TextInput::make('lat')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('lng')
                    ->required()
                    ->numeric(),
                Forms\Components\FileUpload::make('thumbnail_url')
                    ->image(),
                Forms\Components\FileUpload::make('images')
                    ->image()
                    ->columnSpanFull()
                    ->multiple(),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\Select::make('diet_categories')->multiple()
                    ->relationship(name: 'dietCategories', titleAttribute: 'display_name'),
                Forms\Components\Select::make('halal_assurance_id')
                    ->relationship(name: 'halalAssurance', titleAttribute: 'display_name'),
                Forms\Components\Select::make('venue_type_id')
                    ->relationship(name: 'venueType', titleAttribute: 'display_name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->searchable(),
                Tables\Columns\TextColumn::make('area')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telephone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('website')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cuisine.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price_range.display_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('lat')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('lng')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('diet_category.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('halal_assurance.display_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('venue_type.name')
                    ->searchable(),
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
            'index' => Pages\ListVenues::route('/'),
            'create' => Pages\CreateVenue::route('/create'),
            'edit' => Pages\EditVenue::route('/{record}/edit'),
        ];
    }
}
