<?php

namespace App\Filament\Resources\StudyCase\CaseWorks\Schemas;

use Filament\Schemas\Schema;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;

class CaseWorkInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('case_id')
                    ->numeric(),
                TextEntry::make('title'),
                TextEntry::make('slug'),
                TextEntry::make('deleted_at')
                    ->dateTime(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
                RepeatableEntry::make('outcomes')
                    ->label('Outcomes')
                    ->schema([
                        TextEntry::make('title')->label('Title'),
                        TextEntry::make('slug')->label('Slug'),
                        TextEntry::make('stats')->label('Stats'),
                    ])
                    ->columns(2)
            ]);
    }
}
