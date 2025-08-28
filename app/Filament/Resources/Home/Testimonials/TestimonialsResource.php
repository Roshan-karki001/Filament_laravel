<?php

namespace App\Filament\Resources\Home\Testimonials;

use App\Filament\Resources\Home\Testimonials\Pages\CreateTestimonial;
use App\Filament\Resources\Home\Testimonials\Pages\EditTestimonial;
use App\Filament\Resources\Home\Testimonials\Pages\ListTestimonials;
use App\Filament\Resources\Home\Testimonials\Pages\ViewTestimonial;
use App\Filament\Resources\Home\Testimonials\Schemas\TestimonialForm;
use App\Filament\Resources\Home\Testimonials\Schemas\TestimonialInfolist;
use App\Filament\Resources\Home\Testimonials\Tables\TestimonialsTable;
use App\Models\Home\Testimonials;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Support\Icons\Heroicon;
use BackedEnum;
use UnitEnum;

class TestimonialResource extends Resource
{
    protected static ?int $navigationSort = 1; 

    protected static ?string $model = Testimonials::class;

    // Use a valid Heroicon for the sidebar
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedStar;

    // Navigation group
    protected static string|UnitEnum|null $navigationGroup = 'Home';

    // Attribute used as record title
    protected static ?string $recordTitleAttribute = 'testimonials';

    // URL slug for this resource
    protected static ?string $slug = 'home/testimonials';

    // Form schema
    public static function form(Schema $schema): Schema
    {
        return TestimonialForm::configure($schema);
    }

    // Infolist schema
    public static function infolist(Schema $schema): Schema
    {
        return TestimonialInfolist::configure($schema);
    }

    // Table schema
    public static function table(Table $table): Table
    {
        return TestimonialsTable::configure($table);
    }

    // Any relations
    public static function getRelations(): array
    {
        return [];
    }

    // Pages
    public static function getPages(): array
    {
        return [
            'index' => ListTestimonials::route('/'),
            'create' => CreateTestimonial::route('/create'),
            'view' => ViewTestimonial::route('/{record}'),
            'edit' => EditTestimonial::route('/{record}/edit'),
        ];
    }
}
