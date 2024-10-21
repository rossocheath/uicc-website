<?php

namespace App\Filament\Resources\IndustryPartnerResource\Pages;

use App\Filament\Resources\IndustryPartnerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewIndustryPartner extends ViewRecord
{
    protected static string $resource = IndustryPartnerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
