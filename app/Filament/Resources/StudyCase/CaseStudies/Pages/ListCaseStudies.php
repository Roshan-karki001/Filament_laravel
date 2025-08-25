<?php

namespace App\Filament\Resources\StudyCase\CaseStudies\Pages;

use App\Filament\Resources\StudyCase\CaseStudies\CaseStudyResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCaseStudies extends ListRecords
{
    protected static string $resource = CaseStudyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
