<?php

namespace App\Filament\Resources\StudyCase\CaseStudies\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;


class CaseStudyInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            // Section 1: Case Info
            Section::make('Case Information')
                ->schema([
                    TextEntry::make('title')->label('Title'),
                    TextEntry::make('slug')->label('Slug'),
                    TextEntry::make('description')
                        ->label('Description')
                        ->markdown()
                        ->columnSpanFull(),

                    TextEntry::make('link')
                        ->label('Link')
                        ->url(fn ($record) => $record->link)
                        ->openUrlInNewTab(),

                    TextEntry::make('cases_tags')
                        ->label('Tags')
                        ->formatStateUsing(fn (?string $state) => $state
                            ? collect(explode(',', $state))
                                ->map(fn ($tag) => trim($tag))
                                ->filter()
                                ->implode(', ')
                            : ''),
                ])
                ->columns(2),

            // Section 2: Company Info
            Section::make('Company Info')
                ->schema([
                    TextEntry::make('company')->label('Company'),
                    TextEntry::make('year')->label('Year'),
                    TextEntry::make('industry')->label('Industry'),
                ])
                ->columns(2),

            // Section 3: Thumbnail
            Section::make('Thumbnail')
                ->schema([
                    SpatieMediaLibraryImageEntry::make('thumbnail')
                        ->collection('thumbnails')
                        ->label('Thumbnail')
                        ->height(250),
                ]),
        ]);
    }
}
