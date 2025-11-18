<?php

namespace App\Filament\Resources\RequestForms\Pages;

use App\Filament\Resources\RequestForms\RequestFormResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRequestForms extends ListRecords
{
    protected static string $resource = RequestFormResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
