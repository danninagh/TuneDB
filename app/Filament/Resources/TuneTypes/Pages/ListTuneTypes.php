<?php

namespace App\Filament\Resources\TuneTypes\Pages;

use App\Filament\Resources\TuneTypes\TuneTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTuneTypes extends ListRecords
{
    protected static string $resource = TuneTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
