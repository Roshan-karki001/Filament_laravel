<?php

namespace App\Filament\Resources\CaseStudies\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieTagsInput;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Closure;
use Illuminate\Support\Str;
use App\Models\CaseStudy;


class CaseStudyForm
{
    public static function configure($form)
    {
        return $form->schema([
            // Section 1: Case Details
            Section::make('Case Details')
                ->schema([
                    TextInput::make('title')
                        ->required()
                        ->live(onBlur: true)
                        ->maxLength(255)
                        ->afterStateUpdated(
                            fn(string $operation, $state, Closure $set) =>
                            $operation === 'create' ? $set('slug', Str::slug($state)) : null
                        ),

                    TextInput::make('slug')
                        ->disabled()
                        ->dehydrated()
                        ->required()
                        ->maxLength(255)
                        ->unique('App\Models\CaseStudy', 'slug', ignoreRecord: true),

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

            // Section 4: Works & Outcomes
            Section::make('Works & Outcomes')
                ->schema([
                    Repeater::make('works')
                        ->relationship('works')
                        ->schema([
                            TextInput::make('title')->required()->maxLength(255),
                            TextInput::make('slug')->required()->maxLength(255),
                            Textarea::make('description')->label('Description'),

                            // Nested Outcomes inside each Work
                            Repeater::make('outcomes')
                                ->relationship('outcomes')
                                ->schema([
                                    TextInput::make('title')->required()->maxLength(255),
                                    TextInput::make('slug')->required()->maxLength(255),
                                    TextInput::make('stats')->maxLength(255),
                                ])
                                ->label('Outcomes')
                                ->collapsible()
                                ->addActionLabel('Add Outcome'),
                        ])
                        ->label('Case Works')
                        ->collapsible()
                        ->addActionLabel('Add Work')
                        ->columns(2),
                ]),

            // Section 5: Images
            Section::make('Images')
                ->schema([
                    SpatieMediaLibraryFileUpload::make('images')
                        ->collection('images')
                        ->label('Images')
                        ->image()
                        ->acceptedFileTypes(['image/jpeg', 'image/png'])
                        ->helperText('Upload images (Max: 1MB).')
                        ->columnSpanFull(),
                ]),
        ]);
    }
}
