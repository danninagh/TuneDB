<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    protected $fillable = [
        'name',
        'author',
        'publication_date',
    ];

    public function tunes(): BelongsToMany
    {
        return $this->belongsToMany(Tune::class)
            ->withPivot([
                'name_in_book',
                'page_number',
                'tune_number',
                'notes',
            ])
            ->withTimestamps();
    }
}
