<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Models\Products\Product;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(7)->columnSpanFull()->schema([
                    Section::make([
                        Textarea::make('name')
                            ->label('Product Title')
                            ->required()
                            ->columnSpanFull(),
                        Fieldset::make('Tagline Product')
                            ->schema([
                                Textarea::make('subtitle.id')
                                    ->label('Tagline (Bahasa)')
                                    ->required()
                                    ->columnSpanFull(),
                                Textarea::make('subtitle.en')
                                    ->label('Tagline (English)')
                                    ->columnSpanFull(),
                            ])
                            ->columnSpanFull(),
                        Fieldset::make('Excerpt Product')
                            ->schema([
                                Textarea::make('excerpt.id')
                                    ->label('Excerpt (Bahasa)')
                                    ->required()
                                    ->columnSpanFull(),
                                    Textarea::make('excerpt.en')
                                    ->label('Excerpt (English)')
                                    ->columnSpanFull(),
                            ])
                            ->columnSpanFull(),
                        Fieldset::make('Description')
                            ->schema([
                                RichEditor::make('description.id')
                                    ->required()
                                    ->columnSpanFull(),
                                RichEditor::make('description.en')
                                    ->columnSpanFull(),
                            ])
                            ->columnSpanFull(),
                    ])->label('Informasi Umum')->columnSpan(5),
                    Section::make([
                        SpatieMediaLibraryFileUpload::make('thumbnail')
                            ->collection('thumbnail')
                            ->required()
                            ->label('Gambar Thumbnail')
                            ->belowContent('Gambar ini akan digunakan sebagai thumbnail produk. Resolusi terbaik 512x512px.'),
                        SpatieMediaLibraryFileUpload::make('showcase')
                            ->collection('showcase')
                            ->label('Gambar Showcase')
                            ->multiple()
                            ->required()
                            ->minFiles(1)
                            ->maxFiles(5)
                            ->reorderable()
                            ->belowContent('Gambar ini akan digunakan sebagai tampilan produk secara menyeluruh. Resolusi terbaik 512x683px.'),
                        Repeater::make('sizes')
                            ->schema([
                                TextInput::make('id')->required(),
                                TextInput::make('en')->required()
                            ]),
                        Toggle::make('is_active')
                            ->required(),
                        CheckboxList::make('tags')
                            ->relationship(titleAttribute: 'name'),
                        CheckboxList::make('animals')
                            ->relationship(titleAttribute: 'name'),
                        CheckboxList::make('categories')
                            ->relationship(titleAttribute: 'name'),
                    ])->label('Informasi Tambahan')->columnSpan(2)
                ])
            ]);
    }
}
