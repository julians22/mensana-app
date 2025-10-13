<?php

namespace App\Filament\Resources\ProductCategories\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

class ProductCategoryForm
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
            ]);
    }
}
