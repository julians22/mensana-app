<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Models\Products\Product;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('name')
                    ->required()
                    ->columnSpanFull(),
                Fieldset::make('Description')
                    ->schema([
                        RichEditor::make('description.en')
                            ->required()
                            ->columnSpanFull(),
                        RichEditor::make('description.id')
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->required(),
                CheckboxList::make('tags')
                    ->relationship(titleAttribute: 'name'),
                CheckboxList::make('animals')
                    ->relationship(titleAttribute: 'name'),
                CheckboxList::make('categories')
                    ->relationship(titleAttribute: 'name'),
            ]);
    }
}
