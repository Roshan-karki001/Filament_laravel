<?php

namespace App\Filament\Resources\CaseStudies\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Forms\Components\SpatieTagsInput;
use Filament\Infolists\Infolist;

class CaseStudyInfolist
{
    public static function configure($infolist)
    {
        return $infolist
            ->schema([
                // Case Details
                TextEntry::make('title')->label('Title'),
                TextEntry::make('slug')->label('Slug'),
                RichEditor::make('description')->label('Description')->markdown(),
                TextEntry::make('link')->label('Link')->url(fn ($record) => $record->link),
                SpatieTagsInput::make('cases_tags')->label('Tags'),

                // Company Info
                TextEntry::make('company')->label('Company'),
                TextEntry::make('year')->label('Year'),
                TextEntry::make('industry')->label('Industry'),

                // Thumbnail
                ImageEntry::make('thumbnail')
                    ->label('Thumbnail')
                    ->collection('thumbnails')
                    ->circular(),

                // Works & Outcomes
                RepeatableEntry::make('works')
                    ->label('Works')
                    ->schema([
                        TextEntry::make('title')->label('Work Title'),
                        TextEntry::make('slug')->label('Work Slug'),
                        TextEntry::make('description')->label('Work Description'),

                        RepeatableEntry::make('outcomes')
                            ->label('Outcomes')
                            ->schema([
                                TextEntry::make('title')->label('Outcome Title'),
                                TextEntry::make('slug')->label('Outcome Slug'),
                                TextEntry::make('stats')->label('Stats'),
                            ]),
                    ]),

                // Images
                ImageEntry::make('images')
                    ->label('Images')
                    ->collection('images')
                    ->circular()
                    ->columnSpanFull(),
            ]);
    }
}
