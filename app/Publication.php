<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $guarded = [];

    public function parent()
    {
        return $this->belongsTo(Publication::class);
    }

    public function children()
    {
        return $this->hasMany(Publication::class);
    }

    public function publicationable()
    {
        return $this->morphTo();
    }
}
