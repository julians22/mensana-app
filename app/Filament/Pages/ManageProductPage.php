<?php

namespace App\Filament\Pages;

use App\Enums\Filament\AdminNavigationGroup;
use App\Settings\ProductpageSetting;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;
use UnitEnum;

class ManageProductPage extends SettingsPage
{
    protected static string | UnitEnum | null $navigationGroup = AdminNavigationGroup::Settings;

    protected static string $settings = ProductpageSetting::class;

    protected static ?int $navigationSort = 3;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Fieldset::make('Hero Section')
                    ->schema([
                        FileUpload::make('hero_image')
                            ->belowContent('Resolusi terbaik 1200x500px. Tipe File: PNG')
                            ->required()
                            ->image()
                            ->directory('settings')
                            ->disk('public')
                            ->columnSpanFull(),
                        FileUpload::make('hero_image_mobile')
                            ->belowContent('Resolusi terbaik 512x512px. Tipe File: PNG, JPG')
                            ->image()
                            ->directory('settings')
                            ->disk('public')
                            ->columnSpanFull(),
                        TextInput::make('hero_title_id'),
                        TextInput::make('hero_title_en'),
                        RichEditor::make('hero_subtitle_id'),
                        RichEditor::make('hero_subtitle_en'),
                    ])
                    ->columnSpanFull(),

                Fieldset::make('SEO & Meta')
                    ->schema([
                        TextInput::make('title_id')->required(),
                        TextInput::make('title_en')->required(),
                        TextInput::make('meta_description_id')->required(),
                        TextInput::make('meta_description_en')->required(),
                        TextInput::make('meta_keywords_id')->required(),
                        TextInput::make('meta_keywords_en')->required(),
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
            ]);
    }
}
