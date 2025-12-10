<?php

namespace App\Filament\Pages;

use App\Enums\Filament\AdminNavigationGroup;
use App\Settings\ContactpageSetting;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use UnitEnum;

class ManageContactPage extends SettingsPage
{
    protected static string | UnitEnum | null $navigationGroup = AdminNavigationGroup::Settings;

    protected static string $settings = ContactpageSetting::class;

    protected static ?int $navigationSort = 6;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Fieldset::make('SEO & Meta')
                    ->schema([
                        TextInput::make('title_id')
                            ->required(),
                        TextInput::make('title_en')
                            ->required(),
                        TextInput::make('meta_description_id')
                            ->required(),
                        TextInput::make('meta_description_en')
                            ->required(),
                        TextInput::make('meta_keywords_id')
                            ->required(),
                        TextInput::make('meta_keywords_en')
                            ->required(),
                        FileUpload::make('meta_og_img_id')
                            ->image()
                            ->directory('settings')
                            ->disk('public'),
                        FileUpload::make('meta_og_img_en')
                            ->image()
                            ->directory('settings')
                            ->disk('public'),
                    ])
                    ->columnSpanFull(),
                Grid::make(1)
                    ->schema([
                        FileUpload::make('map_images')
                                ->aboveContent('Resolusi terbaik 1200x500px. Tipe File: PNG')
                                ->multiple()
                                ->image()
                                ->reorderable()
                                ->openable(),
                    ]),
                Section::make('Page Content')
                    ->schema([
                        Fieldset::make('Bahasa')
                            ->schema([
                                FileUpload::make('section_content_id.logo'),
                                Textarea::make('section_content_id.subtitle')
                            ]),
                        Fieldset::make('English')
                            ->schema([
                                FileUpload::make('section_content_en.logo'),
                                Textarea::make('section_content_en.subtitle')
                            ])
                    ])
            ]);
    }
}
