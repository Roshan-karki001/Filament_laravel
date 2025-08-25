<?php

namespace App\Filament\Resources\StudyCase\CaseStudies\Pages;

use App\Filament\Resources\StudyCase\CaseStudies\CaseStudyResource;
use Filament\Actions\EditAction;
use App\Models\StudyCase\CaseStudy;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Contracts\Support\Htmlable;

class ViewCaseStudy extends ViewRecord
{
    protected static string $resource = CaseStudyResource::class;

    public function getTitle(): string | Htmlable
    {
        /** @var CaseStudy */
        $record = $this->getRecord();

        return $record->title;
    }
    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}


