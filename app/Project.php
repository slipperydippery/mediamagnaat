<?php

namespace App;

use App\Models\Concerns\UsesOrder;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use UsesOrder;

    protected $fillable = ['title', 'slug', 'description', 'user_id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function entrypoint()
    {
        return $this->hasOne(Entrypoint::class);
    }

    public function publications()
    {
        return $this->hasMany(Publication::class);
    }

    public function layout()
    {
        return $this->hasOne(Layout::class);
    }
}
