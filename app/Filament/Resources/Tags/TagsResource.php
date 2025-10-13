<?php

namespace App\Filament\Resources\Tags;

use App\Filament\Resources\Tags\Pages\CreateTags;
use App\Filament\Resources\Tags\Pages\EditTags;
use App\Filament\Resources\Tags\Pages\ListTags;
use App\Filament\Resources\Tags\Schemas\TagsForm;
use App\Filament\Resources\Tags\Tables\TagsTable;
use App\Models\Products\Tags;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class TagsResource extends Resource
{
    protected static ?string $model = Tags::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string | UnitEnum | null $navigationGroup = 'Products Management';

    public static function form(Schema $schema): Schema
    {
        return TagsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TagsTable::configure($table);
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
            'index' => ListTags::route('/'),
            'create' => CreateTags::route('/create'),
            'edit' => EditTags::route('/{record}/edit'),
        ];
    }
}
