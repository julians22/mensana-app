<?php

namespace App\Filament\Resources\SubCategoryItems\Schemas;

use App\Models\Category;
use App\Models\Category\SubCategory;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

class SubCategoryItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->label('Category')
                    ->options(Category::all()->pluck('name', 'id')->toArray())
                    ->reactive(),
                Select::make('sub_category_id')
                    ->label('Sub Category')
                    ->required()
                    ->options(function(callable $get) {

                        $category = Category::find($get('category_id'));

                        if (!$category) {
                            return SubCategory::all()->pluck('title', 'id')->toArray();
                        }
                        return $category->sub_categories()->pluck('title', 'id')->toArray();
                    }),
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
