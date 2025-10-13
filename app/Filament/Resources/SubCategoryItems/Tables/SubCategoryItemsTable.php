<?php

namespace App\Filament\Resources\SubCategoryItems\Tables;

use App\Models\Category\SubCategoryItem;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;

class SubCategoryItemsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->groups([
                Group::make('sub_category.title')
                    ->label('Sub Category')
                    ->getKeyFromRecordUsing(fn (SubCategoryItem $record): string => $record->sub_category->id),
            ])
            ->defaultGroup('sub_category.title')
            ->columns([
                TextColumn::make('title')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                TextColumn::make('sub_category.title')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),

            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    // DeleteBulkAction::make(),
                ]),
            ]);
    }
}
