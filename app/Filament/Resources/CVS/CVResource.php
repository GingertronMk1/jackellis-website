<?php

namespace App\Filament\Resources\CVS;

use App\Filament\Resources\CVS\Pages\CreateCV;
use App\Filament\Resources\CVS\Pages\EditCV;
use App\Filament\Resources\CVS\Pages\ListCVS;
use App\Filament\Resources\CVS\Schemas\CVForm;
use App\Filament\Resources\CVS\Tables\CVSTable;
use App\Models\CV;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CVResource extends Resource
{
    protected static ?string $model = CV::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return CVForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CVSTable::configure($table);
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
            'index' => ListCVS::route('/'),
            'create' => CreateCV::route('/create'),
            'edit' => EditCV::route('/{record}/edit'),
        ];
    }
}
