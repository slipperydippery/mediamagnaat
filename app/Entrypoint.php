<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrypoint extends Model
{
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }
}
