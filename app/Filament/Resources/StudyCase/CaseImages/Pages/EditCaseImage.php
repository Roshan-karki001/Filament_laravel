<?php

namespace App\Filament\Resources\StudyCase\CaseImages\Pages;

use App\Filament\Resources\StudyCase\CaseImages\CaseImageResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCaseImage extends EditRecord
{
    protected static string $resource = CaseImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
