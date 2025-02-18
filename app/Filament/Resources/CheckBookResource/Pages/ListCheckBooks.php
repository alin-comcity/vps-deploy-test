<?php

namespace App\Filament\Resources\CheckBookResource\Pages;

use App\Filament\Resources\CheckBookResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCheckBooks extends ListRecords
{
    protected static string $resource = CheckBookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
