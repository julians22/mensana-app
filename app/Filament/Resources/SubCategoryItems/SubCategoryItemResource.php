<?php

namespace App\Filament\Resources\SubCategoryItems;

use App\Filament\Resources\SubCategoryItems\Pages\CreateSubCategoryItem;
use App\Filament\Resources\SubCategoryItems\Pages\EditSubCategoryItem;
use App\Filament\Resources\SubCategoryItems\Pages\ListSubCategoryItems;
use App\Filament\Resources\SubCategoryItems\Schemas\SubCategoryItemForm;
use App\Filament\Resources\SubCategoryItems\Tables\SubCategoryItemsTable;
use App\Models\Category\SubCategoryItem;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class SubCategoryItemResource extends Resource
{
    protected static ?string $model = SubCategoryItem::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static string|UnitEnum|null $navigationGroup = 'Posts';

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Schema $schema): Schema
    {
        return SubCategoryItemForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SubCategoryItemsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSubCategoryItems::route('/'),
            'create' => CreateSubCategoryItem::route('/create'),
            'edit' => EditSubCategoryItem::route('/{record}/edit'),
        ];
    }
}
