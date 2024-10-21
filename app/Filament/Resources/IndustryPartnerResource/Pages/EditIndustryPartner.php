<?php

namespace App\Filament\Resources\IndustryPartnerResource\Pages;

use App\Filament\Resources\IndustryPartnerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndustryPartner extends EditRecord
{
    protected static string $resource = IndustryPartnerResource::class;

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
