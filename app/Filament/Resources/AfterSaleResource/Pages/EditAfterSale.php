<?php

namespace App\Filament\Resources\AfterSaleResource\Pages;

use App\Filament\Resources\AfterSaleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAfterSale extends EditRecord
{
    protected static string $resource = AfterSaleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
