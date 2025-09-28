<?php

namespace App\Filament\Resources\Cocktails\Schemas;

use Filament\Forms\Components\Hidden;
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
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Repeater::make('recipe')
                    ->columnSpanFull()
                    ->reorderable()
                    ->schema([
                        TextInput::make('value')
                            ->required(),
                ])
            ]);
    }
}
