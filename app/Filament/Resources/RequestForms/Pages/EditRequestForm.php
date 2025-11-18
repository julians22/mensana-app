<?php

namespace App\Filament\Resources\RequestForms\Pages;

use App\Filament\Resources\RequestForms\RequestFormResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditRequestForm extends EditRecord
{
    protected static string $resource = RequestFormResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
