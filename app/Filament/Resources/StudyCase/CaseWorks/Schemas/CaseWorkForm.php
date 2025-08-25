<?php

namespace App\Filament\Resources\StudyCase\CaseWorks\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Schema;

class CaseWorkForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('case_id')
                    ->required()
                    ->numeric(),
                TextInput::make('title')
                    ->default(null),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('discription')
                    ->default(null)
                    ->columnSpanFull(),
                Repeater::make('outcomes')
                    ->relationship()
                    ->schema([
                        TextInput::make('title')->required()->maxLength(255),
                        TextInput::make('slug')->required()->maxLength(255),
                        TextInput::make('stats')->maxLength(255),
                    ])
                    ->label('Case Work Outcomes')
                    ->collapsible()
                    ->addActionLabel('Add Outcome')
                    ->columns(2)
                    ->columnSpan('full')
            ]);
    }
}
