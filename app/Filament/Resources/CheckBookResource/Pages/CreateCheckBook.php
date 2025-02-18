<?php

namespace App\Filament\Resources\CheckBookResource\Pages;

use App\Filament\Resources\CheckBookResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCheckBook extends CreateRecord
{
    protected static string $resource = CheckBookResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
