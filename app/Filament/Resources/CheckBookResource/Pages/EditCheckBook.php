<?php

namespace App\Filament\Resources\CheckBookResource\Pages;

use App\Filament\Resources\CheckBookResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCheckBook extends EditRecord
{
    protected static string $resource = CheckBookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
