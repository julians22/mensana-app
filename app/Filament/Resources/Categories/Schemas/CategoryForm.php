<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Fieldset::make('Title')
                    ->schema([
                        Textarea::make('title.en')
                            ->label('English Name')
                            ->required()
                            ->maxLength(255),
                        Textarea::make('title.id')
                            ->label('Bahasa Name')
                            ->required()
                            ->maxLength(255),
                    ])
                ->columns(2),
            ]);
    }
}
