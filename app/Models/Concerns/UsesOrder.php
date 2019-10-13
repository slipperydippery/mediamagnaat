<?php


namespace App\Models\Concerns;


trait UsesOrder
{
    protected static function bootUsesOrder()
    {
        static::creating(function ($model)
        {
            $model->order = $model->count() + 1;

        });
    }
}
