<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function publication()
    {
        return $this->morphOne(Publication::class, 'publicationable');
    }
}
