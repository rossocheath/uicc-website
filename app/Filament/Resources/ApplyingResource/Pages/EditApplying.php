<?php

namespace App\Filament\Resources\ApplyingResource\Pages;

use App\Filament\Resources\ApplyingResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditApplying extends EditRecord
{
    protected static string $resource = ApplyingResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
