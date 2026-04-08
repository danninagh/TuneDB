<?php

namespace App\Filament\Resources\Tunes\Pages;

use App\Filament\Resources\Tunes\TuneResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTunes extends ListRecords
{
    protected static string $resource = TuneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
