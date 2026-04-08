<?php

namespace App\Filament\Resources\Tunes\Pages;

use App\Filament\Resources\Tunes\TuneResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTune extends EditRecord
{
    protected static string $resource = TuneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
