<?php

namespace App\Filament\Resources\IndustryPartnerResource\Pages;

use App\Filament\Resources\IndustryPartnerResource;
use Filament\Resources\Pages\CreateRecord;

class CreateIndustryPartner extends CreateRecord
{
    protected static string $resource = IndustryPartnerResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
