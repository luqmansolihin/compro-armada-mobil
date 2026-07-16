<?php

namespace App\Filament\Resources\BrochureResource\Pages;

use App\Filament\Resources\BrochureResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageBrochures extends ManageRecords
{
    protected static string $resource = BrochureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
