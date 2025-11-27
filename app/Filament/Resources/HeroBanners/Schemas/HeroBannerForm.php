<?php

namespace App\Filament\Resources\HeroBanners\Schemas;

use Filament\Forms\Components\RichEditor;
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
                        Textarea::make('title.id')->label('Indonesian'),
                        Textarea::make('title.en')->label('English')
                    ])
                    ->columnSpanFull(),
                Fieldset::make('Subtitle')
                    ->schema([
                        RichEditor::make('subtitle.id')
                            ->toolbarButtons(config('custom-filament.toolbar_buttons.banner_subtitle')),
                        RichEditor::make('subtitle.en')
                            ->toolbarButtons(config('custom-filament.toolbar_buttons.banner_subtitle')),
                    ])
                    ->columnSpanFull(),
                SpatieMediaLibraryFileUpload::make('featured_image')
                    ->belowContent('Resolusi terbaik 1200x675px'),
                SpatieMediaLibraryFileUpload::make('featured_image_mobile')
                    ->collection('featured_image_mobile')
                    ->belowContent('Resolusi terbaik 512x512px.'),
            ]);
    }
}
