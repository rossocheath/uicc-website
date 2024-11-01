<?php

namespace App\Filament\Resources\ApplyingResource\Pages;

use App\Filament\Resources\ApplyingResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListApplyings extends ListRecords
{
    protected static string $resource = ApplyingResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
