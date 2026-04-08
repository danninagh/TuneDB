<?php

namespace App\Filament\Resources\Tunes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class TuneForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('two_bar'),
                Select::make('tune_type_id')
                    ->relationship('tuneType', 'name')
                    ->searchable()
                    ->preload(),
                TextInput::make('key'),
                Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }
}
