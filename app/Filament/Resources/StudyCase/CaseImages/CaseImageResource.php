<?php

namespace App\Filament\Resources\StudyCase\CaseImages;

use App\Filament\Resources\StudyCase\CaseImages\Pages\CreateCaseImage;
use App\Filament\Resources\StudyCase\CaseImages\Pages\EditCaseImage;
use App\Filament\Resources\StudyCase\CaseImages\Pages\ListCaseImages;
use App\Filament\Resources\StudyCase\CaseImages\Pages\ViewCaseImage;
use App\Filament\Resources\StudyCase\CaseImages\Schemas\CaseImageForm;
use App\Filament\Resources\StudyCase\CaseImages\Schemas\CaseImageInfolist;
use App\Filament\Resources\StudyCase\CaseImages\Tables\CaseImagesTable;
use App\Models\StudyCase\CaseImage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class CaseImageResource extends Resource
{
    protected static ?string $model = CaseImage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Photo;

    protected static string|\UnitEnum|null $navigationGroup = 'Study Case';

    protected static ?string $slug = 'StudyCase/Caseimages';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return CaseImageForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CaseImageInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CaseImagesTable::configure($table);
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
            'index' => ListCaseImages::route('/'),
            'create' => CreateCaseImage::route('/create'),
            'view' => ViewCaseImage::route('/{record}'),
            'edit' => EditCaseImage::route('/{record}/edit'),
        ];
    }
}
