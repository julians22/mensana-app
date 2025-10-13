<?php

namespace App\Filament\Resources\SubCategoryItems\Pages;

use App\Filament\Resources\SubCategoryItems\SubCategoryItemResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSubCategoryItem extends EditRecord
{
    protected static string $resource = SubCategoryItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
