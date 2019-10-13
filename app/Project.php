<?php

namespace App;

use App\Models\Concerns\UsesOrder;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use UsesOrder;

    protected $fillable = ['title', 'description', 'user_id'];

    public function entrypoint()
    {
        return $this->belongsTo(Publication::class);
    }
}
