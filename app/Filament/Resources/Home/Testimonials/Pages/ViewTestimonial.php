<?php

namespace App\Filament\Resources\Home\Testimonials\Pages;

use App\Filament\Resources\Home\Testimonials\TestimonialResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTestimonial extends ViewRecord
{
    protected static string $resource = TestimonialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
