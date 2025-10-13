<?php

namespace App\Filament\Resources\Tags\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

class TagsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Fieldset::make('Name')
                    ->schema([
                        Textarea::make('name.en')
                            ->required()
                            ->columnSpanFull(),
                        Textarea::make('name.id')
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                TextInput::make('color')
                    ->required()
                    ->default('blue'),
            ]);
    }
}
