<?php

namespace App\Observers;

use App\Models\CurriculumVitae;

class CurriculumVitaeObserver
{
    /**
     * Handle the CurriculumVitae "created" event.
     */
    public function created(CurriculumVitae $curriculumVitae): void
    {
        //
    }

    /**
     * Handle the CurriculumVitae "updated" event.
     */
    public function updated(CurriculumVitae $curriculumVitae): void
    {
        $previous = $curriculumVitae->getPrevious();
        unset($previous['id']);
        $newCV = new CurriculumVitae($previous);
        $newCV->created_at = $curriculumVitae->created_at;
        $newCV->updated_at = $curriculumVitae->created_at;
        $newCV->timestamps = false;
        $newCV->save();
    }

    /**
     * Handle the CurriculumVitae "deleted" event.
     */
    public function deleted(CurriculumVitae $curriculumVitae): void
    {
        //
    }

    /**
     * Handle the CurriculumVitae "restored" event.
     */
    public function restored(CurriculumVitae $curriculumVitae): void
    {
        //
    }

    /**
     * Handle the CurriculumVitae "force deleted" event.
     */
    public function forceDeleted(CurriculumVitae $curriculumVitae): void
    {
        //
    }
}
