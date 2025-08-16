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
        $newCV = new CurriculumVitae;
        $newCV->body = $curriculumVitae->body;
        $newCV->parent_id = $curriculumVitae->id;
        $newCV->save();

        return false;
    }
}
