<?php

namespace App\Filament\Admin\Resources\Cocktails\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class CocktailForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Repeater::make('recipe')
                    ->columnSpanFull()
                    ->simple(
                        Textarea::make('step')
                            ->required()
                            ->rows(2),
                    ),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
