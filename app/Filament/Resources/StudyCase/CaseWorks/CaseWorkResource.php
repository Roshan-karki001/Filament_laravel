<?php

namespace App\Filament\Resources\StudyCase\CaseWorks;

use App\Filament\Resources\StudyCase\CaseWorks\Pages\CreateCaseWork;
use App\Filament\Resources\StudyCase\CaseWorks\Pages\EditCaseWork;
use App\Filament\Resources\StudyCase\CaseWorks\Pages\ListCaseWorks;
use App\Filament\Resources\StudyCase\CaseWorks\Pages\ViewCaseWork;
use App\Filament\Resources\StudyCase\CaseWorks\Schemas\CaseWorkForm;
use App\Filament\Resources\StudyCase\CaseWorks\Schemas\CaseWorkInfolist;
use App\Filament\Resources\StudyCase\CaseWorks\Tables\CaseWorksTable;
use App\Models\StudyCase\CaseWork;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CaseWorkResource extends Resource
{
    protected static ?string $model = CaseWork::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-document-text'; // Fixed

    protected static string|\UnitEnum|null $navigationGroup = 'Study Case'; // Fixed

    protected static ?string $slug = 'study-case/caseworks';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return CaseWorkForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CaseWorkInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CaseWorksTable::configure($table);
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
            'index' => ListCaseWorks::route('/'),
            'create' => CreateCaseWork::route('/create'),
            'view' => ViewCaseWork::route('/{record}'),
            'edit' => EditCaseWork::route('/{record}/edit'),
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
