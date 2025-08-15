<?php

namespace App\Models;

use App\Observers\CurriculumVitaeObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy(CurriculumVitaeObserver::class)]
class CurriculumVitae extends Model
{
    use HasTimestamps;
    use SoftDeletes;

    protected $fillable = [
        'body',
    ];
}
