<?php

namespace App\Filament\Resources\RequestForms;

use App\Filament\Resources\RequestForms\Pages\CreateRequestForm;
use App\Filament\Resources\RequestForms\Pages\EditRequestForm;
use App\Filament\Resources\RequestForms\Pages\ListRequestForms;
use App\Filament\Resources\RequestForms\Schemas\RequestFormForm;
use App\Filament\Resources\RequestForms\Tables\RequestFormsTable;
use App\Models\RequestForm;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class RequestFormResource extends Resource
{
    protected static ?string $model = RequestForm::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Download Catalog Request';

    public static function form(Schema $schema): Schema
    {
        return RequestFormForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RequestFormsTable::configure($table);
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
            'index' => ListRequestForms::route('/'),
            'create' => CreateRequestForm::route('/create'),
            // 'edit' => EditRequestForm::route('/{record}/edit'),
        ];
    }
}
