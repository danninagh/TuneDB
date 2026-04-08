<?php

namespace App\Filament\Resources\TuneTypes\Pages;

use App\Filament\Resources\TuneTypes\TuneTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTuneType extends EditRecord
{
    protected static string $resource = TuneTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
