<?php

namespace App\Filament\Resources\Cocktails;

use App\Filament\Resources\Cocktails\Pages\CreateCocktail;
use App\Filament\Resources\Cocktails\Pages\EditCocktail;
use App\Filament\Resources\Cocktails\Pages\ListCocktails;
use App\Filament\Resources\Cocktails\Pages\ViewCocktail;
use App\Filament\Resources\Cocktails\Schemas\CocktailForm;
use App\Filament\Resources\Cocktails\Schemas\CocktailInfolist;
use App\Filament\Resources\Cocktails\Tables\CocktailsTable;
use App\Models\Cocktail;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CocktailResource extends Resource
{
    protected static ?string $model = Cocktail::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return CocktailForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CocktailInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CocktailsTable::configure($table);
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
            'index' => ListCocktails::route('/'),
            'create' => CreateCocktail::route('/create'),
            'view' => ViewCocktail::route('/{record}'),
            'edit' => EditCocktail::route('/{record}/edit'),
        ];
    }
}
