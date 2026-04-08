<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tune extends Model
{
    protected $fillable = [
    'name',
    'two_bar',
    'tune_type_id',
    'key',
    'notes',
    ];
    public function tuneType(): BelongsTo
        {
            return $this->belongsTo(TuneType::class);
        }
}
