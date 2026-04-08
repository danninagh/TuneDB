<?php

namespace App\Filament\Resources\TuneTypes;

use App\Filament\Resources\TuneTypes\Pages\CreateTuneType;
use App\Filament\Resources\TuneTypes\Pages\EditTuneType;
use App\Filament\Resources\TuneTypes\Pages\ListTuneTypes;
use App\Filament\Resources\TuneTypes\Schemas\TuneTypeForm;
use App\Filament\Resources\TuneTypes\Tables\TuneTypesTable;
use App\Models\TuneType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TuneTypeResource extends Resource
{
    protected static ?string $model = TuneType::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return TuneTypeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TuneTypesTable::configure($table);
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
            'index' => ListTuneTypes::route('/'),
            'create' => CreateTuneType::route('/create'),
            'edit' => EditTuneType::route('/{record}/edit'),
        ];
    }
}
