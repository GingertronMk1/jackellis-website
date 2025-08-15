<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CurriculumVitae extends Model
{
    use HasTimestamps;
    use SoftDeletes;

    protected $fillable = [
        'body',
    ];
}
