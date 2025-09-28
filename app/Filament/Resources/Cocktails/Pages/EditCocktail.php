<?php

namespace App\Filament\Resources\Cocktails\Pages;

use App\Filament\Resources\Cocktails\CocktailResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCocktail extends EditRecord
{
    protected static string $resource = CocktailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
