<?php

namespace App\Filament\Resources\IndustryPartnerResource\Pages;

use App\Filament\Resources\IndustryPartnerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIndustryPartners extends ListRecords
{
    protected static string $resource = IndustryPartnerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
