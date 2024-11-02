<?php

namespace App\Filament\Resources\ApplyingResource\Pages;

use App\Filament\Resources\ApplyingResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewApplying extends ViewRecord
{
    protected static string $resource = ApplyingResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    public function mount($record): void
    {
        parent::mount($record);
        $this->record->update(['status' => 'READ']);
    }
}
