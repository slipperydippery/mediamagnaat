<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Layout extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
    	return 'slug';
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
