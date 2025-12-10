<?php

namespace App\Filament\Pages;

use App\Enums\Filament\AdminNavigationGroup;
use App\Settings\AboutpageSetting;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use UnitEnum;

class ManageAboutPage extends SettingsPage
{
    protected static string | UnitEnum | null $navigationGroup = AdminNavigationGroup::Settings;

    protected static string $settings = AboutpageSetting::class;

    protected static ?int $navigationSort = 2;

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
                        TextInput::make('hero_title_id')
                            ->belowContent('Judul banner dengan ukuran font yang lebih besar, kosongkan jika tidak diperlukan'),
                        TextInput::make('hero_title_en')
                            ->belowContent('Judul banner dengan ukuran font yang lebih besar, kosongkan jika tidak diperlukan'),
                        RichEditor::make('hero_subtitle_id')
                            ->toolbarButtons(config('custom-filament.toolbar_buttons.banner_subtitle')),
                        RichEditor::make('hero_subtitle_en')
                            ->toolbarButtons(config('custom-filament.toolbar_buttons.banner_subtitle')),
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

                Section::make('Achievement Settings')
                    ->schema([
                        Repeater::make('achievements')
                            ->schema([
                                TextInput::make('title_id')
                                    ->required(),
                                TextInput::make('title_en'),
                                TextInput::make('subtitle_id')
                                    ->required(),
                                TextInput::make('subtitle_en'),
                                Textarea::make('description_id')
                                    ->maxLength(200),
                                Textarea::make('description_en')
                                    ->maxLength(200),
                                FileUpload::make('thumbnail')
                                    ->belowContent('Resolusi terbaik 220x330px. Tipe File: PNG, JPG')
                                    ->image()
                                    ->directory('setting/achievements')
                                    ->disk('public')
                                    ->required()
                                    ->columnSpanFull()
                            ])
                            ->cloneable()
                            ->collapsible()
                            ->columns(2)
                    ])
                    ->columnSpanFull(),

                Section::make('Page Content Section')
                    ->schema([
                        Repeater::make('section_contents')
                            ->schema([
                                TextInput::make('title_id')
                                    ->required(),
                                TextInput::make('title_en'),
                                RichEditor::make('subtitle_id')
                                    ->toolbarButtons(config('custom-filament.toolbar_buttons.banner_subtitle')),
                                RichEditor::make('subtitle_en')
                                    ->toolbarButtons(config('custom-filament.toolbar_buttons.banner_subtitle')),
                                FileUpload::make('background')
                                    ->belowContent('Resolusi terbaik 1200x400px. Tipe File: PNG, JPG')
                                    ->image()
                                    ->directory('setting/section_contents')
                                    ->disk('public')
                                    ->required()
                                    ->columnSpanFull(),
                                Radio::make('text_position')
                                    ->options([
                                        'left' => 'Left',
                                        'right' => 'Right',
                                    ])
                                    ->default('left')
                            ])
                            ->cloneable()
                            ->collapsible()
                            ->columns(2)
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
