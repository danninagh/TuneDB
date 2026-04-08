<?php

namespace App\Filament\Resources\Tunes;

use App\Filament\Resources\Tunes\Pages\CreateTune;
use App\Filament\Resources\Tunes\Pages\EditTune;
use App\Filament\Resources\Tunes\Pages\ListTunes;
use App\Filament\Resources\Tunes\Schemas\TuneForm;
use App\Filament\Resources\Tunes\Tables\TunesTable;
use App\Models\Tune;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TuneResource extends Resource
{
    protected static ?string $model = Tune::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return TuneForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TunesTable::configure($table);
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
            'index' => ListTunes::route('/'),
            'create' => CreateTune::route('/create'),
            'edit' => EditTune::route('/{record}/edit'),
        ];
    }
}
