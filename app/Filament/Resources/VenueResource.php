<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VenueResource\Pages;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use App\Models\DietCategory;
use App\Models\HalalAssurance;
use App\Models\PriceRange;
use App\Models\Cuisine;
use App\Models\Venue;
use App\Models\VenueType;
use App\Forms\Components\PublicRichEditor;

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
                Forms\Components\Select::make('area_id')->relationship(name: 'area', titleAttribute: 'display_name')
                    ->required(),
                Forms\Components\TextInput::make('telephone')
                    ->tel(),
                Forms\Components\TextInput::make('website'),
                Forms\Components\TextInput::make('email')
                    ->email(),
                Forms\Components\TextInput::make('google_maps_url'),
                Forms\Components\Select::make('cuisines')->multiple()->relationship(name: 'cuisines', titleAttribute: 'display_name')->preload(),
                Forms\Components\Select::make('price_range_id')->relationship(name: 'priceRange', titleAttribute: 'display_name'),
                Forms\Components\TextInput::make('lat')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('lng')
                    ->required()
                    ->numeric(),
                Forms\Components\FileUpload::make('thumbnail_url')
                    ->image()
                    ->disk('s3')
                    ->directory('venues')
                    ->visibility('private')
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('16:9')
                    ->imageResizeTargetWidth('1920')
                    ->imageResizeTargetHeight('1080'),
                Forms\Components\FileUpload::make('images')
                    ->image()
                    ->disk('s3')
                    ->directory('venues')
                    ->visibility('private')
                    ->columnSpanFull()
                    ->multiple(),
                PublicRichEditor::make('description')
                    ->fileAttachmentsDisk('s3')
                    ->fileAttachmentsDirectory('venues')
                    ->fileAttachmentsVisibility('private')
                    ->required(),
                Forms\Components\Select::make('diet_categories')->multiple()
                    ->relationship(name: 'dietCategories', titleAttribute: 'display_name')->preload(),
                Forms\Components\Select::make('halal_assurance_id')
                    ->relationship(name: 'halalAssurance', titleAttribute: 'display_name')->preload(),
                Forms\Components\Select::make('venue_type_id')
                    ->relationship(name: 'venueType', titleAttribute: 'display_name'),
                Forms\Components\Select::make('vegetarian_type_id')
                    ->relationship(name: 'vegetarianType', titleAttribute: 'display_name')
                    ->preload(),
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
                // Tables\Columns\TextColumn::make('city')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('area.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cuisine')->state(fn($record) => $record->cuisines->pluck('display_name')->join(', ')),
                Tables\Columns\TextColumn::make('price_range.display_name'),
                Tables\Columns\TextColumn::make('diet_category')
                    ->state(fn($record) => $record->dietCategories->pluck('display_name')->join(', ')),
                Tables\Columns\TextColumn::make('halalAssurance.display_name'),
                Tables\Columns\TextColumn::make('venue_type')
                    ->state(fn($record) => $record->venueType?->display_name ?? '-'),
                Tables\Columns\TextColumn::make('vegetarian_type')
                    ->state(fn($record) => $record->vegetarianType?->display_name ?? '-'),
            ])
            ->filters([
                SelectFilter::make('cousines')
                    ->relationship('cuisines', 'display_name')
                    ->multiple()
                    ->searchable()
                    ->preload(),
                SelectFilter::make('diet_categories')
                    ->relationship('dietCategories', 'display_name')
                    ->multiple()
                    ->searchable()
                    ->preload(),
                SelectFilter::make('vegetarian_type')
                    ->relationship('vegetarianType', 'display_name')
                    ->searchable()
                    ->preload(),
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
