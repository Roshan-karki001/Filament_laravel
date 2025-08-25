<?php

namespace App\Filament\Resources\StudyCase\CaseImages\Pages;

use App\Filament\Resources\StudyCase\CaseImages\CaseImageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCaseImages extends ListRecords
{
    protected static string $resource = CaseImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
