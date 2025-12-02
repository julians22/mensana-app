<?php

namespace App\Filament\Resources\Articles\Schemas;

use App\Models\Category\SubCategory;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\RichEditor\TextColor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Schemas\Components\Fieldset;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Illuminate\Contracts\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Support\Collection;
use Tiptap\Editor;

class ArticleForm
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
                Fieldset::make('Excerpt')
                    ->schema([
                        Textarea::make('excerpt.id')->label('Indonesian')->required(),
                        Textarea::make('excerpt.en')->label('English')
                    ]),
                Fieldset::make('Body')
                    ->schema([
                        Builder::make('body.id')
                            ->label('Konten Indonesia')
                            ->blocks([
                                Block::make('heading')
                                    ->schema([
                                        TextInput::make('content')
                                            ->label('Heading')
                                            ->required(),
                                        Select::make('level')
                                            ->options([
                                                'h2' => 'Heading 2',
                                                'h3' => 'Heading 3',
                                                'h4' => 'Heading 4',
                                                'h5' => 'Heading 5',
                                                'h6' => 'Heading 6',
                                            ])
                                            ->required(),
                                    ])
                                    ->columns(2),
                                Block::make('paragraph')
                                    ->schema([
                                        Textarea::make('content')
                                            ->label('Paragraph')
                                            ->required(),
                                    ]),
                                Block::make('image')
                                    ->schema([
                                        FileUpload::make('url')
                                            ->label('Image')
                                            ->image()
                                            ->required(),
                                        TextInput::make('alt')
                                            ->label('Alt text')
                                            ->required(),
                                        Select::make('width')
                                            ->label('Ukuran Gambar (Lebar)')
                                            ->options([
                                                '50%' => '50%',
                                                '100%' => '100%',
                                            ])
                                    ]),
                                ]),
                        Builder::make('body.en')
                            ->label('Konten Inggris')
                            ->blocks([
                                Block::make('heading')
                                    ->schema([
                                        TextInput::make('content')
                                            ->label('Heading')
                                            ->required(),
                                        Select::make('level')
                                            ->options([
                                                'h2' => 'Heading 2',
                                                'h3' => 'Heading 3',
                                                'h4' => 'Heading 4',
                                                'h5' => 'Heading 5',
                                                'h6' => 'Heading 6',
                                            ])
                                            ->required(),
                                    ])
                                    ->columns(2),
                                Block::make('paragraph')
                                    ->schema([
                                        Textarea::make('content')
                                            ->label('Paragraph')
                                            ->required(),
                                    ]),
                                Block::make('image')
                                    ->schema([
                                        FileUpload::make('url')
                                            ->label('Image')
                                            ->image()
                                            ->required(),
                                        TextInput::make('alt')
                                            ->label('Alt text')
                                            ->required(),
                                        Select::make('width')
                                            ->label('Ukuran Gambar (Lebar)')
                                            ->options([
                                                '50%' => '50%',
                                                '100%' => '100%',
                                            ])
                                    ]),
                            ])
                    ])->columnSpanFull(),
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->live()
                    ->required(),
                CheckboxList::make('sub_category')
                    ->relationship(
                        'sub_category',
                        titleAttribute: 'title',
                        modifyQueryUsing: fn (EloquentBuilder $query, Get $get) => $query->where('category_id', $get('category_id')),
                    ),
                DateTimePicker::make('published_at'),
                SpatieMediaLibraryFileUpload::make('featured_image'),
                Fieldset::make('SEO Meta')
                    ->schema([
                        Fieldset::make('Meta Title')
                            ->schema([
                                Textarea::make('meta_title.id')->label('Indonesian'),
                                Textarea::make('meta_title.en')->label('English'),
                            ]),
                        Fieldset::make('Meta Description')
                            ->schema([
                                Textarea::make('meta_description.id')->label('Indonesian'),
                                Textarea::make('meta_description.en')->label('English'),
                            ]),
                        Fieldset::make('Meta Keywords')
                            ->schema([
                                Textarea::make('meta_keywords.id')->label('Indonesian'),
                                Textarea::make('meta_keywords.en')->label('English'),
                            ]),
                    ])->columnSpanFull(),
            ]);
    }
}
