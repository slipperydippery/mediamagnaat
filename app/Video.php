<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $guarded = [];

    public function publication()
    {
        return $this->morphOne(Publication::class, 'publicationable');
    }
}
