<?php

namespace App\Filament\Pages;

use App\Enums\Filament\AdminNavigationGroup;
use App\Settings\HomepageSetting;
use BackedEnum;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class ManageHomePage extends SettingsPage
{
    protected static string | UnitEnum | null $navigationGroup = AdminNavigationGroup::Settings;

    protected static string $settings = HomepageSetting::class;

    protected static ?int $navigationSort = 1;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
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

                Section::make('Marketing Content Section')
                    ->schema([
                        Section::make('Marketing Content Title')
                            ->schema([
                                Repeater::make('marketing_section_titles_id')
                                    ->maxItems(2)
                                    ->schema([
                                        TextInput::make('title'),
                                        Select::make('textstyle')
                                            ->options([
                                                'normal' => 'Normal',
                                                'bold' => 'Bold'
                                            ])
                                            ->default('normal')
                                        ]),
                                Repeater::make('marketing_section_titles_en')
                                    ->maxItems(2)
                                    ->schema([
                                        TextInput::make('title'),
                                        Select::make('textstyle')
                                            ->options([
                                                'normal' => 'Normal',
                                                'bold' => 'Bold'
                                            ])
                                            ->default('normal')
                                        ]),
                            ])
                            ->columns(2),
                        Section::make('Marketing Contents Left')
                            ->columns(2)
                            ->schema([
                                Fieldset::make('Bahasa')
                                    ->columns(1)
                                    ->schema([
                                        Radio::make('marketing_section_left_contents_id.layout')
                                            ->live()
                                            ->options([
                                                'background' => 'Background',
                                                'non_background' => 'Non Background'
                                            ]),
                                        FileUpload::make('marketing_section_left_contents_id.background_image')
                                            ->belowContent('Resolusi Terbaik 752 × 300 px')
                                            ->hidden(fn (Get $get): bool => $get('marketing_section_left_contents_id.layout') == 'non_background'),
                                        FileUpload::make('marketing_section_left_contents_id.thumbnail_image')
                                            ->hidden(fn (Get $get): bool => $get('marketing_section_left_contents_id.layout') == 'background')
                                            ->belowContent('Resolusi Terbaik 256 x 394 px'),
                                        TextInput::make('marketing_section_left_contents_id.badge_title'),
                                        TextInput::make('marketing_section_left_contents_id.title'),
                                        Textarea::make('marketing_section_left_contents_id.subtitle')
                                            ->hidden(fn (Get $get): bool => $get('marketing_section_left_contents_id.layout') == 'background'),
                                    ]),
                                Fieldset::make('English')
                                    ->columns(1)
                                    ->schema([
                                        Radio::make('marketing_section_left_contents_en.layout')
                                            ->live()
                                            ->options([
                                                'background' => 'Background',
                                                'non_background' => 'Non Background'
                                            ]),
                                        FileUpload::make('marketing_section_left_contents_en.background_image')
                                            ->belowContent('Resolusi Terbaik 752 × 300 px')
                                            ->hidden(fn (Get $get): bool => $get('marketing_section_left_contents_en.layout') == 'non_background'),
                                        FileUpload::make('marketing_section_left_contents_en.thumbnail_image')
                                            ->hidden(fn (Get $get): bool => $get('marketing_section_left_contents_en.layout') == 'background')
                                            ->belowContent('Resolusi Terbaik 256 x 394 px'),
                                        TextInput::make('marketing_section_left_contents_en.badge_title'),
                                        TextInput::make('marketing_section_left_contents_en.title'),
                                        Textarea::make('marketing_section_left_contents_en.subtitle')
                                            ->hidden(fn (Get $get): bool => $get('marketing_section_left_contents_en.layout') == 'background')
                                    ]),
                            ]),
                        Section::make('Marketing Contents Right')
                            ->columns(2)
                            ->schema([
                                Fieldset::make('Bahasa')
                                    ->columns(1)
                                    ->schema([
                                        Radio::make('marketing_section_right_contents_id.layout')
                                            ->live()
                                            ->options([
                                                'background' => 'Background',
                                                'non_background' => 'Non Background'
                                            ]),
                                        FileUpload::make('marketing_section_right_contents_id.background_image')
                                            ->belowContent('Resolusi Terbaik 752 × 300 px')
                                            ->hidden(fn (Get $get): bool => $get('marketing_section_right_contents_id.layout') == 'non_background'),
                                        FileUpload::make('marketing_section_right_contents_id.thumbnail_image')
                                            ->hidden(fn (Get $get): bool => $get('marketing_section_right_contents_id.layout') == 'background')
                                            ->belowContent('Resolusi Terbaik 256 x 394 px'),
                                        TextInput::make('marketing_section_right_contents_id.badge_title'),
                                        TextInput::make('marketing_section_right_contents_id.title'),
                                        Textarea::make('marketing_section_right_contents_id.subtitle')
                                            ->hidden(fn (Get $get): bool => $get('marketing_section_right_contents_id.layout') == 'background'),
                                    ]),
                                Fieldset::make('English')
                                    ->columns(1)
                                    ->schema([
                                        Radio::make('marketing_section_right_contents_en.layout')
                                            ->live()
                                            ->options([
                                                'background' => 'Background',
                                                'non_background' => 'Non Background'
                                            ]),
                                        FileUpload::make('marketing_section_right_contents_en.background_image')
                                            ->belowContent('Resolusi Terbaik 752 × 300 px')
                                            ->hidden(fn (Get $get): bool => $get('marketing_section_right_contents_en.layout') == 'non_background'),
                                        FileUpload::make('marketing_section_right_contents_en.thumbnail_image')
                                            ->hidden(fn (Get $get): bool => $get('marketing_section_right_contents_en.layout') == 'background')
                                            ->belowContent('Resolusi Terbaik 256 x 394 px'),
                                        TextInput::make('marketing_section_right_contents_en.badge_title'),
                                        TextInput::make('marketing_section_right_contents_en.title'),
                                        Textarea::make('marketing_section_right_contents_en.subtitle')
                                            ->hidden(fn (Get $get): bool => $get('marketing_section_right_contents_en.layout') == 'background'),
                                    ]),
                            ])
                    ])
                    ->columnSpanFull()
            ]);
    }
}
