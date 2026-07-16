<?php

namespace App\Filament\Resources\OperationalHourResource\Pages;

use App\Filament\Resources\OperationalHourResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageOperationalHours extends ManageRecords
{
    protected static string $resource = OperationalHourResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
