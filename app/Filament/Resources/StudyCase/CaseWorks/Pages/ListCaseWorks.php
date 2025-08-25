<?php

namespace App\Filament\Resources\StudyCase\CaseWorks\Pages;

use App\Filament\Resources\StudyCase\CaseWorks\CaseWorkResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCaseWorks extends ListRecords
{
    protected static string $resource = CaseWorkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
