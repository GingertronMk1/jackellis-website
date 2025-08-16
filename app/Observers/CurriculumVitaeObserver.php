<?php

namespace App\Observers;

use App\Models\CurriculumVitae;

class CurriculumVitaeObserver
{
    /**
     * Basically making CVs revisionable
     */
    public function updating(CurriculumVitae $curriculumVitae): bool
    {
        CurriculumVitae::query()->create([
            'body' => $curriculumVitae->body,
        ]);

        return false;
    }
}
