<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TuneType extends Model
{
    protected $fillable = [
        'name',
        'time_signature',
    ];

    public function tunes(): HasMany
    {
        return $this->hasMany(Tune::class);
    }
}
