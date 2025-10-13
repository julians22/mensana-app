<?php

namespace App\Filament\Resources\SubCategoryItems\Pages;

use App\Filament\Resources\SubCategoryItems\SubCategoryItemResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSubCategoryItems extends ListRecords
{
    protected static string $resource = SubCategoryItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
