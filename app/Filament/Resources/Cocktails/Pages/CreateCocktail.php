<?php

namespace App\Filament\Resources\Cocktails\Pages;

use App\Filament\Resources\Cocktails\CocktailResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCocktail extends CreateRecord
{
    protected static string $resource = CocktailResource::class;
}
