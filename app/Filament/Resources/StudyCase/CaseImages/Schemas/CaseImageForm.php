<?php

namespace App\Filament\Resources\StudyCase\CaseImages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CaseImageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('case_id')
                    ->required()
                    ->numeric(),
                FileUpload::make('image')
                    ->image(),
            ]);
    }
}
