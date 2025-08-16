<?php

namespace App\Filament\Resources\CurriculumVitaes\Pages;

use App\Filament\Resources\CurriculumVitaes\CurriculumVitaeResource;
use App\Models\CurriculumVitae;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCurriculumVitae extends EditRecord
{
    protected static string $resource = CurriculumVitaeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): ?string
    {
        /** @var CurriculumVitae $record */
        $record = $this->getRecord();

        return $this->getResource()::getUrl('edit', ['record' => $record->child->id]);
    }
}
