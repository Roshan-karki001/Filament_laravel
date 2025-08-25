<?php

namespace App\Filament\Resources\StudyCase\CaseWorks\Pages;

use App\Filament\Resources\StudyCase\CaseWorks\CaseWorkResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCaseWork extends EditRecord
{
    protected static string $resource = CaseWorkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
