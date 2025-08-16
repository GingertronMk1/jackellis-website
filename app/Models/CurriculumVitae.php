<?php

namespace App\Models;

use App\Observers\CurriculumVitaeObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy(CurriculumVitaeObserver::class)]
class CurriculumVitae extends Model
{
    use HasTimestamps;
    use SoftDeletes;

    protected $fillable = [
        'body',
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(static::class, 'parent_id');
    }

    public function child(): HasOne
    {
        return $this->hasOne(static::class, 'parent_id');
    }
}
