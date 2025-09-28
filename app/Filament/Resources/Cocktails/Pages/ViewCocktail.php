<?php

namespace App\Filament\Resources\Cocktails\Pages;

use App\Filament\Resources\Cocktails\CocktailResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCocktail extends ViewRecord
{
    protected static string $resource = CocktailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
