<?php

namespace App\Filament\Resources\StudyCase\CaseWorks\Pages;

use App\Filament\Resources\StudyCase\CaseWorks\CaseWorkResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCaseWork extends ViewRecord
{
    protected static string $resource = CaseWorkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
