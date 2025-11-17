<?php

namespace App\Filament\Resources\HeroBanners\Schemas;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

class HeroBannerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Fieldset::make('Title')
                    ->schema([
                        Textarea::make('title.id')->label('Indonesian')->required(),
                        Textarea::make('title.en')->label('English')
                    ]),
                Fieldset::make('Subtitle')
                    ->schema([
                        Textarea::make('subtitle.id')->label('Indonesian'),
                        Textarea::make('subtitle.en')->label('English')
                    ]),
                TextInput::make('link'),
                SpatieMediaLibraryFileUpload::make('featured_image'),
            ]);
    }
}
