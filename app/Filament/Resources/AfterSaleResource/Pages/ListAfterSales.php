<?php

namespace App\Filament\Resources\AfterSaleResource\Pages;

use App\Filament\Resources\AfterSaleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAfterSales extends ListRecords
{
    protected static string $resource = AfterSaleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
