<?php

namespace App\Filament\Resources\StudyCase\CaseImages\Pages;

use App\Filament\Resources\StudyCase\CaseImages\CaseImageResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCaseImage extends ViewRecord
{
    protected static string $resource = CaseImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
