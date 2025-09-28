<?php

namespace App\Filament\Admin\Resources\Cocktails\Pages;

use App\Filament\Admin\Resources\Cocktails\CocktailResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCocktail extends CreateRecord
{
    protected static string $resource = CocktailResource::class;
}
