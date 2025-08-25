<?php

namespace App\Filament\Resources\StudyCase\CaseStudies\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Filters\TrashedFilter;

class CaseStudiesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Title')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('slug')
                    ->label('Slug')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('description')
                    ->label('Description')
                    ->limit(50) // show first 50 chars only
                    ->wrap() // wrap long text to multiple lines
                    ->toggleable(), // allow hiding/showing

                TextColumn::make('link')
                    ->label('Link')
                    ->url(fn ($record) => $record->link)
                    ->openUrlInNewTab()
                    ->sortable(false)
                    ->searchable(false)
                    ->toggleable(),

                TextColumn::make('company')
                    ->label('Company')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('year')
                    ->label('Year')
                    ->sortable(),

                TextColumn::make('industry')
                    ->label('Industry')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
