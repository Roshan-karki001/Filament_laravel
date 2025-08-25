<?php

namespace App\Filament\Resources\StudyCase\CaseStudies;

use App\Filament\Resources\StudyCase\CaseStudies\Pages\CreateCaseStudy;
use App\Filament\Resources\StudyCase\CaseStudies\Pages\EditCaseStudy;
use App\Filament\Resources\StudyCase\CaseStudies\Pages\ListCaseStudies;
use App\Filament\Resources\StudyCase\CaseStudies\Pages\ViewCaseStudy;
use App\Filament\Resources\StudyCase\CaseStudies\Schemas\CaseStudyForm;
use App\Filament\Resources\StudyCase\CaseStudies\Schemas\CaseStudyInfolist;
use App\Filament\Resources\StudyCase\CaseStudies\Tables\CaseStudiesTable;
use App\Models\StudyCase\CaseStudy;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class CaseStudyResource extends Resource
{
    protected static ?string $model = CaseStudy::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Star;

    protected static string|UnitEnum|null $navigationGroup = 'Study Case';
    
    protected static ?string $slug = 'StydyCase/Casestudies';

    protected static ?string $recordTitleAttribute = 'CaseStudy';


    public static function form(Schema $schema): Schema
    {
        return CaseStudyForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CaseStudyInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CaseStudiesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCaseStudies::route('/'),
            'create' => CreateCaseStudy::route('/create'),
            'view' => ViewCaseStudy::route('/{record}'),
            'edit' => EditCaseStudy::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
