<?php

namespace App\Filament\Resources\Books\RelationManagers;

use App\Filament\Resources\Tunes\TuneResource;
use Filament\Actions\AttachAction;
use Filament\Actions\DetachAction;
use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class TunesRelationManager extends RelationManager
{
    protected static string $relationship = 'tunes';

    protected static ?string $relatedResource = TuneResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Tune')
                    ->searchable(),

                Tables\Columns\TextColumn::make('pivot.name_in_book')
                    ->label('Name in book'),

                Tables\Columns\TextColumn::make('pivot.page_number')
                    ->label('Page'),

                Tables\Columns\TextColumn::make('pivot.tune_number')
                    ->label('Tune no.'),
            ])
            ->headerActions([
                AttachAction::make()
                    ->recordSelectSearchColumns(['name'])
                    ->form(fn (AttachAction $action): array => [
                        $action->getRecordSelect(),

                        Forms\Components\TextInput::make('name_in_book')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('page_number')
                            ->numeric(),

                        Forms\Components\TextInput::make('tune_number')
                            ->maxLength(255),

                        Forms\Components\Textarea::make('notes'),
                    ]),
            ])
            ->actions([
                DetachAction::make(),
            ]);
    }
}
