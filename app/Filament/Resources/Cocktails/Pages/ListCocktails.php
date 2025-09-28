<?php

namespace App\Filament\Resources\Cocktails\Pages;

use App\Filament\Resources\Cocktails\CocktailResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCocktails extends ListRecords
{
    protected static string $resource = CocktailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
