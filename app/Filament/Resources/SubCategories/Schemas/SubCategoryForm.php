<?php

namespace App\Filament\Resources\SubCategories\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

class SubCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->relationship(name: 'category', titleAttribute: 'name'),
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
