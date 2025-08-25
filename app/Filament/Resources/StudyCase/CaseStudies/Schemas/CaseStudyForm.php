<?php

namespace App\Filament\Resources\StudyCase\CaseStudies\Schemas;

use Filament\Schemas\Schema;
use App\Models\StudyCase\CaseStudy;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\SpatieTagsInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Str;

class CaseStudyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            // Section 1: Case Details
            Section::make('Case Details')
                ->schema([
                    TextInput::make('title')
                        ->required()
                        ->live(onBlur: true)
                        ->maxLength(255)
                        ->afterStateUpdated(fn (string $operation, $state, Set $set) =>
                            $operation === 'create' ? $set('slug', Str::slug($state)) : null
                        ),

                    TextInput::make('slug')
                        ->disabled()
                        ->dehydrated()
                        ->required()
                        ->maxLength(255)
                        ->unique(CaseStudy::class, 'slug', ignoreRecord: true),

                    RichEditor::make('description')
                        ->required()
                        ->maxLength(1000)
                        ->columnSpanFull(),

                    TextInput::make('link')
                        ->url()
                        ->maxLength(255),

                    SpatieTagsInput::make('cases_tags')
                        ->label('Tags')
                        ->type('cases_tags')
                        ->placeholder('Add tags (use comma or enter)')
                        ->columnSpanFull(),
                ])
                ->columns(2),

            // Section 2: Company Info
            Section::make('Company Info')
                ->schema([
                    TextInput::make('company')->maxLength(255),
                    TextInput::make('year')->numeric()->minValue(1900)->maxValue(now()->year),
                    TextInput::make('industry')->maxLength(255),
                ])
                ->columns(2),

            // Section 3: Thumbnail
            Section::make('Thumbnail')
                ->schema([
                    SpatieMediaLibraryFileUpload::make('thumbnail')
                        ->collection('thumbnails')
                        ->label('Thumbnail')
                        ->image()
                        ->acceptedFileTypes(['image/jpeg', 'image/png'])
                        ->maxSize(1024)
                        ->imagePreviewHeight('250')
                        ->helperText('Upload a thumbnail image (Max: 1MB).')
                        ->columnSpanFull(),
                ]),
        ]);
    }
}
