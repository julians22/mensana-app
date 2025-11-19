<?php

namespace App\Filament\Pages;

use App\Enums\Filament\AdminNavigationGroup;
use App\Settings\GeneralSetting;
use BackedEnum;
use Dom\Text;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class General extends SettingsPage
{
    protected static string | UnitEnum | null $navigationGroup = AdminNavigationGroup::Settings;

    protected static string $settings = GeneralSetting::class;

    protected static ?int $navigationSort = 7;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Contacts Data')
                    ->schema([
                        Repeater::make('contacts')
                            ->schema([
                                TextInput::make('value'),
                                Select::make('type')
                                    ->options([
                                        'phone' => 'Phone',
                                        'email' => 'Email',
                                    ])
                            ])
                        ]),
                Section::make('Social Media')
                    ->schema([
                        Repeater::make('socials')
                            ->schema([
                                TextInput::make('value'),
                                Select::make('type')
                                    ->options([
                                        'instagram' => 'Instagram',
                                        'facebook' => 'Facebook',
                                        'tiktok' => 'TikTok',
                                        'twitter' => 'Twitter',
                                        'youtube' => 'Youtube'
                                    ])
                            ])
                        ]),
                Section::make('Quick Call Setting')
                    ->schema([
                        TextInput::make('quick_call_number')
                            ->required()
                            ->placeholder('81234567890')
                            ->prefix('+62'),
                        Textarea::make('quick_call_opening_text'),
                    ]),
                RichEditor::make('address')
                    ->toolbarButtons([
                        'h2',
                        'h3',
                        'bold'
                    ]),

                Section::make('Logo Setting')
                    ->schema([
                        FileUpload::make('header_logo')
                            ->image()
                            ->directory('general/logo')
                            ->disk('public'),
                        FileUpload::make('footer_logo')
                            ->image()
                            ->directory('general/logo')
                            ->disk('public'),
                    ]),

                Section::make('Catalogue Setting')
                    ->schema([
                        FileUpload::make('catalogue_id')
                            ->visibility('private')
                            ->maxSize(122880)
                            ->acceptedFileTypes(['application/pdf']),

                        FileUpload::make('catalogue_en')
                            ->visibility('private')
                            ->maxSize(122880)
                            ->acceptedFileTypes(['application/pdf']),

                    ]),
            ]);
    }
}
